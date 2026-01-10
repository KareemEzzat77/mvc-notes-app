<?php
// Include the configuration file

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/core/helpers.php";
require_once __DIR__ . "/../app/config/database.php";


use Main\core\Session;

Session::start();

$router = require '../app/routes.php';
$router->dispatch();
