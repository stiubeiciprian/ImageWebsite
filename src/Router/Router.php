<?php


namespace App\Router;

use App\Router\Request;

/**
 * Class Router
 * @package App\Router
 */
class Router
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Router constructor.
     * @param \App\Router\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}