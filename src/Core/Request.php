<?php


namespace App\Core;

/**
 * Class Request
 * @package App\Core
 */
class Request
{
    /**
     * @return string
     */
    public static function getUrl() : string
    {
        return $_SERVER["REQUEST_URI"];
    }

    /**
     * @return array
     */
    public static function getQuery() : array
    {
        return  $_GET;
    }

    /**
     * @return array
     */
    public static function getPost() : array
    {
        return $_POST;
    }

    /**
     * @return array
     */
    public static function getFiles() : array
    {
        return $_FILES;
    }

    /**
     * @return string
     */
    public static function getMethod() : string
    {
        return  $_SERVER["REQUEST_METHOD"];
    }
}