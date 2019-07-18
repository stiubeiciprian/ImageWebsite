<?php

/**
 * @param array $payload
 */
function saveImage(array $payload) {

    $payload['image']->writeImage($payload['output-file']);

}