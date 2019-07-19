<?php


function showHelp() {

    $helpMessage = file_get_contents('help.txt', true);

    print $helpMessage.PHP_EOL;
}