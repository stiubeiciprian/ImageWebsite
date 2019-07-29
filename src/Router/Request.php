<?php


namespace App\Router;

/**
 * Class Request
 * @package App\Router
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
        $this->query = $_GET;
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
}