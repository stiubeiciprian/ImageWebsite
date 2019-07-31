<?php


namespace App\Core;

/**
 * Class Core
 * @package App\Core
 */
class Router
{

    /**
     * @var mixed
     */
    private $urlMap;

    /**
     * Core constructor.
     * @param \App\Core\Request $request
     */
    public function __construct(array $urlMap)
    {
        $this->urlMap = $urlMap;
    }

    /**
     * Call controller method corresponding to uri.
     */
    public function redirect() : void
    {
        $uri = Request::getUrl();

        if( isset($this->urlMap[$uri]) && in_array($uri, $this->urlMap)) {
            call_user_func($this->urlMap[$uri]);
        }
    }

}