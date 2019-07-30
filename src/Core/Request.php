<?php


namespace App\Core;

/**
 * Class Request
 * @package App\Core
 */
class Request
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $query;


    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->query = $_GET;
        $this->post = $_POST;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getQuery() : array
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getPost() : array
    {
        return $this->post;
    }

    /**
     * @return string
     */
    public function getMethod() : string
    {
        return $this->method;
    }
}