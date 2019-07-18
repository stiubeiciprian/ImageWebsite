<?php

/**
 * Returns errors formatted for display.
 *
 * @param array $errorsArray
 * @return string
 */
function errorArrayToString (array $errorsArray) : string
{
    $errorsStr = "Errors:" . PHP_EOL;

    foreach ($errorsArray as $value) {
        $errorsStr .= $value . PHP_EOL;
    }

    return $errorsStr;
}