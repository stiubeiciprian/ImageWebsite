<?php
ini_set('display_errors', 'On');

require_once "vendor/autoload.php";
require_once "constants.php";

use App\Core\Request;
use App\Core\Router;
use App\Core\Session;

use App\Controller\ProductController;
use App\Controller\UserController;

//TODO Router Factory
$session = new Session();
$request = new Request();

$productController = new ProductController($request, $session);
$userController = new UserController($request, $session);
$urlMap = require_once "routeConfig.php";

$router = new Router($request, $session, $urlMap);

$router->redirect();

