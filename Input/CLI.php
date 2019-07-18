<?php


/**
 * @param $argc
 * @param $argv
 * @return array
 */
function convertCLInputToPayload($argc, $argv) : array {

    array_shift($argv);


    for($i = 0; $i < $argc - 1; $i++) {

        $parameterName = trim($argv[$i],'-');

        if (strchr($argv[$i], '=')) {
            $argv[$i] = explode('=',$parameterName);
        }
        else {
            $argv[$i] = [$parameterName, NULL];
        }

    }

    $keys = array_column($argv, 0);
    $values = array_column($argv, 1);

    $payload = array_combine($keys,$values);

    return $payload;
}

