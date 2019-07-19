<?php


include_once "Input/CLI.php";
include_once "IsHelp/isHelp.php";
include_once "Validation/validateCommand.php";
include_once "LoadImage/readImage.php";
include_once "Operations/width.php";
include_once "Operations/height.php";
include_once "Operations/ratio.php";
include_once "AddWatermark/watermark.php";
include_once "SaveImage/saveImage.php";
include_once "Errors/arrayToString.php";
include_once "Output/showError.php";
include_once "Output/showHelp.php";
include_once "Output/showSuccess.php";


function main($argc, $argv) {

    $payload = convertCLInputToPayload($argc,$argv);


    if( isHelp($payload) == NULL ) {
        showHelp();
        return;
    }

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
    showSuccess($payload);

}

main($argc, $argv);