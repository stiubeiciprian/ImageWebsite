<?php


/**
 * Returns x,y coordinates corresponding to a random corner of the image with given dimensions,
 * such that the watermark of given dimensions fits inside the image.
 *
 * @param array $imageDimensions - [width,height] array of dimensions of an image
 * @param array $watermarkDimensions - [width, height] array of dimensions of a watermark
 * @return array - [x, y] - array of coordinates, x,y - integers
 */
function randomizeCorner(array $imageDimensions, array $watermarkDimensions) : array {

    $corners = [
        [10, 10],
        [10, $imageDimensions['height'] - $watermarkDimensions['height'] - 10],
        [$imageDimensions['width'] - $watermarkDimensions['width'] - 10 , 10],
        [$imageDimensions['width'] - $watermarkDimensions['width'] - 10, $imageDimensions['height'] - $watermarkDimensions['height'] - 10]
    ];

    return $corners[rand(0,count($corners)-1)];
}


/**
 * Adds a watermark to the image.
 *
 * @param $payload - contains an image and the path to the watermark
 * @return mixed
 * @throws ImagickException
 */
function addWatermarkToImage($payload)
{
    if (!in_array("watermark", array_keys($payload)))
        return $payload;

    $watermark = new Imagick();
    $watermark->readImage($payload['watermark']);


    $imageDimensions = $payload['image']->getImageGeometry();

    $watermark->scaleImage($imageDimensions['width']*0.15, 0);
    $watermark->evaluateImage(Imagick::EVALUATE_DIVIDE, 2, Imagick::CHANNEL_ALPHA);

    $watermarkDimensions = $watermark->getImageGeometry();


    $watermarkXYCoordinates = randomizeCorner($imageDimensions, $watermarkDimensions);

    $payload["image"]->compositeImage($watermark, Imagick::COMPOSITE_OVER, ...$watermarkXYCoordinates);

    return $payload;

}

