<?php


namespace App\Core;

/**
 * Class Core
 * @package App\Core
 */
class Router
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Core constructor.
     * @param \App\Core\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}