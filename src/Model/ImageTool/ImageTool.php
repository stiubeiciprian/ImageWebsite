<?php

namespace App\Model\ImageTool;
require_once "/var/www/my-application/ImageEditor/image-manipulation.php";

/**
 * Class ImageTool
 * @package App\Model\ImageTool
 */
class ImageTool
{



    /**
     * @param string $inputFile
     * @param string $outputFile
     * @param string $width
     */
    public function resizeImageWidth(string $inputFile, string $outputFile, string $width)
    {
        $payload = [
            "input-file" => $inputFile,
            "output-file" => $outputFile,
            "width" => $width
        ];

        transform(3, $payload);
    }

    /**
     * @param string $inputFile
     * @param string $outputFile
     * @param string $height
     */
    public function resizeImageHeight(string $inputFile, string $outputFile, string $height)
    {
        $payload = [
            "input-file" => $inputFile,
            "output-file" => $outputFile,
            "height" => $height
        ];

        transform(3, $payload);
    }

    /**
     * @param string $inputFile
     * @param string $outputFile
     * @param string $watermarkPath
     */
    public function saveImageWithWatermark(string $inputFile, string $outputFile, string $watermarkPath)
    {
        $payload = [
            "input-file" => $inputFile,
            "output-file" => $outputFile,
            "watermark" => $watermarkPath
        ];

        transform(3, $payload);
    }

    /**
     * @param string $inputFile
     * @param string $outputFile
     * @param string $watermarkPath
     */
    public function saveImage(string $inputFile, string $outputFile)
    {
        $payload = [
            "input-file" => $inputFile,
            "output-file" => $outputFile
        ];

        transform(2, $payload);
    }


    /**
     * @param string $inputFile
     * @param string $outputFile
     * @param string $watermarkPath
     * @param string $height
     */
    public function resizeImageHeightWatermark(string $inputFile, string $outputFile, string $watermarkPath, string $height)
    {
        $payload = [
            "input-file" => $inputFile,
            "output-file" => $outputFile,
            "height" => $height,
            "watermark" => $watermarkPath
        ];

        transform(4, $payload);
    }

    /**
     * @param string $inputFile
     * @param string $outputFile
     * @param string $watermarkPath
     * @param string $width
     */
    public function resizeImageWidthWatermark(string $inputFile, string $outputFile, string $watermarkPath, string $width)
    {
        $payload = [
            "input-file" => $inputFile,
            "output-file" => $outputFile,
            "width" => $width,
            "watermark" => $watermarkPath
        ];

        transform(4, $payload);
    }
}