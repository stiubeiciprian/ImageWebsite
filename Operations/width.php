<?php

/**
 * @param array $payload
 * @return bool - false if width is not a key of payload
 */
function canExecuteWidth(array $payload) : bool
{
    return in_array("width", array_keys($payload));
}

/**
 * Changes the width of the image given in the payload. The aspect ratio is not changed.
 *
 * @param array $payload
 * @return array
 */
function width(array $payload) : array
{
    if (!canExecuteWidth($payload))
        return $payload;

    $width = (int)$payload['width'];

    $payload['image']->scaleImage($width, 0);

    return $payload;
}