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
     * @var Session
     */
    private $session;

    /**
     * @var mixed
     */
    private $urlMap;

    /**
     * Core constructor.
     * @param \App\Core\Request $request
     */
    public function __construct(Request $request, Session $session, array $urlMap)
    {
        $this->request = $request;
        $this->session = $session;
        $this->urlMap = $urlMap;
    }

    /**
     * Call controller method corresponding to uri.
     */
    public function redirect() : void
    {
        $uri = $this->request->getUrl();

        if( isset($this->urlMap[$uri]) && in_array($uri, $this->urlMap)) {
            call_user_func($this->urlMap[$uri]);
        }
    }

}