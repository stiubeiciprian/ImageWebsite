<?php

const ERROR_HEIGHT ="Invalid height value.";
const ERROR_WIDTH ="Invalid width value.";
const ERROR_FORMAT = "Invalid aspect ratio.";
const ERROR_PATH = "Invalid path.";
const ERROR_WATERMARK_FILE = "File given for watermark does not exist.";
const ERROR_IMAGE_FILE = "File given for image does not exist.";
const ERROR_FILE_TYPE = "Unsupported file type (File must be .png/.jpg/.jpeg).";
const ERROR_WATERMARK_TYPE = "Unsupported watermark type (File must be .png/.jpg/.jpeg).";
const ERROR_ARGUMENTS = "Missing arguments.";
const ERROR_SAVE_IMAGE = "Image cannot be saved to given path.";

const SUPPORTED_EXTENSIONS = ["png", "jpg", "jpeg"];

/**
 * @param array $payload
 * @return array
 */
function validateCommand(array $payload) : array
{

    $errors = [];

    // Verify if required arguments were given
    if (!isset($payload['input-file']) && !isset($payload['output-file'])) {
        $errors[] = ERROR_ARGUMENTS;
    }

    // Validate input file
    if (isset($payload['input-file']) && !file_exists($payload['input-file'])) {
        $errors[] = ERROR_IMAGE_FILE;
    } elseif (isset($payload['input-file']) && validMimeType($payload['input-file'])) {
        $errors[] = ERROR_FILE_TYPE;
    }


    // Validate output file
    if (isset($payload['output-file']) && !validFilePath($payload['output-file'])) {
        $errors[] = ERROR_SAVE_IMAGE;
    }
    elseif (isset($payload['output-file']) && !validFileType($payload['output-file'])) {
        $errors[] = ERROR_FILE_TYPE;
    }

    // Validate watermark

    if (isset($payload['watermark'])) {

        if (!file_exists($payload['watermark'])) {
            $errors[] = ERROR_WATERMARK_FILE;
        } elseif (!validFileType($payload['watermark'])) {
            $errors[] = ERROR_WATERMARK_TYPE;
        }
    }


    // Validate width value if it exists
    if (isset($payload['width']) && !validPixels($payload['width'])) {
        $errors[] = ERROR_WIDTH;
    }


    // Validate height value if it exists
    if (isset($payload['height']) && !validPixels($payload['height'])) {
        $errors[] = ERROR_HEIGHT;
    }


    // Validate aspect ratio
    if (isset($payload['format']) && !validFormat($payload['format'])) {
        $errors[] = ERROR_FORMAT;
    }

    return $errors;
}


/**
 * @param string $pixels
 * @return bool
 */
function validPixels(string $pixels) : bool
{
    return preg_match("/^\d+$/", $pixels) == 1;
}


/**
 * Validate format of an image (width:height).
 *
 * @param string $format
 * @return bool
 */
function validFormat(string $format) : bool
{
    return preg_match("/^\d+:\d+$/", $format) == 1;
}

/**
 *
 * Checks if the file extension is valid.
 *
 * @param string $filePath
 * @return bool
 */
function validFileType(string $filePath) : bool
{

    // Check extension
    $filePath = explode('.', $filePath);
    $extension = mb_strtolower(end($filePath));

    return in_array($extension, SUPPORTED_EXTENSIONS);
}

/**
 * Checks if the directory of the given file exists.
 *
 * @param string $path
 * @return bool
 */
function validFilePath(string $path) : bool
{
    preg_match("/(?<path>.*\/)*(?<file>\w+\..+)/",$path, $matches);

    return file_exists($matches['path']) || $matches['path'] == "";

}


/**
 * @param string $path
 * @return bool
 */
function validMimeType(string $path) : bool
{
    $mimeType = mime_content_type($path);

    foreach (SUPPORTED_EXTENSIONS as $extension){
        if ('image/'.$extension == $mimeType)
            return true;
    }

    return false;
}