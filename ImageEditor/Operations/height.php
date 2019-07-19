<?php

/**
 * @param array $payload
 * @return bool - false if height is not a key of payload
 */
function canExecuteHeight(array $payload) : bool
{
    return in_array("height", array_keys($payload));
}

/**
 * Changes the height of the image given in the payload. The aspect ratio is not changed.
 *
 * @param array $payload
 * @return array
 */
function height(array $payload) :array
{
    if (!canExecuteHeight($payload))
        return $payload;

    $height = (int)$payload['height'];

    $payload['image']->scaleImage(0, $height);

    return $payload;
}