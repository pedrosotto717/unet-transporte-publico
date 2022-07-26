<?php

namespace app\utils;

require_once __DIR__ . '/../helpers.php';

class Application
{
    public Router $router;

    function __construct()
    {
        $this->router = new Router(Request::getMethod(), Request::getUrl());
    }

    public function run()
    {
        try {

            if ($this->router->match()) {
                $route = $this->router->resolve();
                $action = $route->handler();

                if (is_array($action)) {

                    $controller = new $action[0];
                    $method_action = (string) $action[1];

                    $controller->{$method_action}($route->params());
                } elseif (is_callable($action)) {
                    $res = call_user_func($action, $route->params());
                } else {
                    throw new \Exception("Error Processing Request", 1);
                }
            } else {
                require_once __DIR__ . '/../../views/not-found.php';
            }
        } catch (\Exception $ex) {
            require_once __DIR__ . '/../../views/error.php';
        }
    }
}
