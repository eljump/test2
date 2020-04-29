<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/config.php');
require_once(ROOT . '/components/Route/Router.php');
require_once(ROOT . '/components/DBrequests.php');
$router = new Router();
$router->run();