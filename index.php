<?php
ini_set('display_errors', 'On');

require_once "vendor/autoload.php";
require_once "constants.php";
require_once "src/Model/Persistence/propertyNames.php";

use App\Core\Request;
use App\Core\Router;
use App\Core\Session;

use App\Controller\ProductController;
use App\Controller\UserController;


Session::openSession();

$userController = new UserController();
$productController = new ProductController();


$urlMap = require_once "routeConfig.php";

$router = new Router($urlMap);

$uri = Request::getUrl();

if( isset($urlMap[$uri])) {
    call_user_func($urlMap[$uri]);
}

