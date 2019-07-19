<?php

    function isHelp(array $parameters) {
        if (array_key_exists("help", $parameters))
            return NULL;

        return $parameters;
    }