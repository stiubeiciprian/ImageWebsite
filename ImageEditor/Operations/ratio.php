<?php


/**
 * Returns the float value of the x:y aspect ratio.
 *
 * @param string $format - aspect ratio given as 'x:y' string
 * @return float - the result of x/y
 */
function getAspectRatio(string $format) : float
{
    $format = explode(':', $format);
    $height = $format[0];
    $width = $format[1];

    return $width/$height;

}

/**
 *
 * Changes the aspect ratio of the image given in the payload.
 *
 * @param array $payload
 * @return array
 */
function ratio(array $payload) : array
{

    if(!array_key_exists('format',$payload))
        return $payload;

    $aspectRatio = getAspectRatio($payload['format']);


    if(array_key_exists('width', $payload))
    {
        $width = $payload['image']->getImageWidth();
        $payload['image']->scaleImage($width, (int)($width / $aspectRatio));

        return $payload;
    }

    $height = $payload['image']->getImageHeight();
    $payload['image']->scaleImage((int)($aspectRatio * $height), $height);

    return $payload;
}