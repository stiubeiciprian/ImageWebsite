<?php


namespace App\Core;

use App\Controller\ProductController;
use App\Controller\UserController;
use App\Core\Request;
use App\Core\Session;

/**
 * Class Core
 * @package App\Core
 */
class Router
{
    private $userController;
    private $productController;
    private $request;
    private $session;
    /**
     * @var mixed
     */
    private $urlMap;

    /**
     * Core constructor.
     * @param \App\Core\Request $request
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->session = new Session();

        $this->userController = new UserController($this->request, $this->session);
        $this->productController = new ProductController($this->request, $this->session);

        $this->urlMap = [

            // Default action
            "/" => [$this->productController, 'showProducts'],

            // Product actions
            "/products" => [$this->productController, 'showProducts'],
            "/product" => [$this->productController, 'showProduct'],
            "/product/upload" => [$this->productController, 'uploadProduct'],
            "/product/buy" => [$this->productController, 'buyProduct'],

            // User actions
            "/user/login" => [$this->userController, 'login'],
            "/user/logout" => [$this->userController, 'logout'],
            "/user/register" => [$this->userController, 'register'],
            "/user/orders" => [$this->userController, 'showOrders'],
            "/user/uploads" => [$this->userController, 'showUploads']
        ];
    }

    /**
     * Call controller method corresponding to uri.
     */
    public function redirect() : void
    {
        $uri = $this->request->getUrl();

        if( isset($uri) ) {
            call_user_func($this->urlMap[$uri]);
        }
    }

}