<?php


/**
 * @param array $payload
 * @return array
 * @throws ImagickException
 */
function loadImage(array $payload) : array {

    $payload["image"] = new Imagick();

    $payload["image"]->readImage($payload['input-file']);

    return $payload;
}