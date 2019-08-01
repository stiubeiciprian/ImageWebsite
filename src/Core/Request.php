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
    public function getUrl() : string
    {
        $uri = $_SERVER["REQUEST_URI"];
        $uri = explode('?',$uri);
        return array_shift($uri);

    }

    /**
     * @return array
     */
    public function getQuery() : array
    {
        return  $_GET;
    }

    /**
     * @return array
     */
    public function getPost() : array
    {
        return $_POST;
    }

    /**
     * @return array
     */
    public function getFiles() : array
    {
        return $_FILES;
    }

    /**
     * @return string
     */
    public function getMethod() : string
    {
        return  $_SERVER["REQUEST_METHOD"];
    }
}