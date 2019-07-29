<?php
ini_set('display_errors', 'On');

require_once "vendor/autoload.php";

use App\Router\Request;
use App\Router\Router;

use App\Controller\ProductController;
use App\Controller\UserController;


//TODO: wrap in class

$productController = new ProductController();
$userController = new UserController();

$request = new Request();
$router = new Router($request);

$urlMap = require_once "routeConfig.php";

if( isset($urlMap[$request->getUrl()]))
    call_user_func($urlMap[$request->getUrl()]);
else echo "Page does not exist.";

