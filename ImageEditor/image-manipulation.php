<?php
require_once "Input/CLI.php";
require_once "IsHelp/isHelp.php";
require_once "Validation/validateCommand.php";
require_once "LoadImage/readImage.php";
require_once "Operations/width.php";
require_once "Operations/height.php";
require_once "Operations/ratio.php";
require_once "AddWatermark/watermark.php";
require_once "SaveImage/saveImage.php";
require_once "Errors/arrayToString.php";
require_once "Output/showError.php";
require_once "Output/showHelp.php";
require_once "Output/showSuccess.php";


function transform($argc, $argv) {

    $payload = $argv;

    $validationErrors = validateCommand($payload);

    if ( !empty($validationErrors) ) {
        showErrors(errorArrayToString($validationErrors));
        return;
    }

    try {
        $payload = loadImage($payload);
        $payload = width($payload);
        $payload = height($payload);
        $payload = ratio($payload);
        $payload = addWatermarkToImage($payload);


    saveImage($payload);
    } catch (ImagickException $exception) {
        showErrors("Imagick error" . $exception->getMessage() );
    }

    return $payload['output-file'];

}