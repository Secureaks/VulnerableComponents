<?php

namespace Secureaks\VulnerableComponents\Router;

use Secureaks\VulnerableComponents\Controllers\HomeController;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

class Router
{

    public function run(): void
    {
        $router = new RouteCollector();

        /**
         * Routes definition
         */

        $router->get('/', function () {
            $controller = new HomeController();
            $controller->index();
        });

        $router->post('/contact', function () {
            $controller = new HomeController();
            $controller->contact();
        });

        /**
         * End of routes definition
         */

        try {
            $dispatcher = new Dispatcher($router->getData());
            $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        } catch (HttpRouteNotFoundException $e) {
            $controller = new HomeController();
            $controller->error404();
        }
    }
}