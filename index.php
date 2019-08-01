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


$router = new Router();

$router->redirect();



