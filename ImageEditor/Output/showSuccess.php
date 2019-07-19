<?php


function showSuccess(array $payload)
{
    print "File was successfully saved to: " . realpath($payload['output-file']) . PHP_EOL;
}