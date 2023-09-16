<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Secureaks\VulnerableComponents\Router\Router;

$router = new Router();
$router->run();
