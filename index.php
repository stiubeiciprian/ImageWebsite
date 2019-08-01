<?php
ini_set('display_errors', 'On');

require_once "vendor/autoload.php";

require_once "constants.php";
require_once "src/Model/Persistence/propertyNames.php";

use App\Core\Router;


$router = new Router();

$router->redirect();



