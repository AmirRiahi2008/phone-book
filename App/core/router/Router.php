<?php

namespace App\Core\Router;

use App\Core\Request;
use App\Core\Router\Routes;
class Router
{
    private $currentRoute;
    private $request;
    private $routes;
    const BASE_CONTROLLER = "App\controllers\\";

    public function __construct(Request $request)
    {
        $this->routes = Routes::getRoutes();
        $this->request = $request;
        $this->currentRoute = $this->findRoute($this->request);
        if (isset($this->currentRoute["middleware"]) && !empty($this->currentRoute["middleware"]))
            $this->handleMiddleware();
    }

    public function handleMiddleware()
    {
        foreach ($this->currentRoute["middleware"] as $middleware) {
            $class = new $middleware();
            $class->handle();
        }
    }
    public function findRoute($request)
    {

        foreach ($this->routes as $route) {

            if (!in_array($request->getMethod(), $route["method"])) {
                continue;
            }
            if ($this->regexMatched($route)) {

                return $route;
            }

        }
        return null;
    }
    public function regexMatched($route)
    {

        $pattern = "/^" . str_replace(['/', '{', '}'], ['\/', '(?<', '>[-%\w]+)'], $route["uri"]) . "$/";
        $stateMatch = preg_match($pattern, $this->request->getUri(), $matches);
        if (!$stateMatch) {
            return;
        }

        foreach ($matches as $key => $value) {
            if (!is_int($key)) {
                $this->request->setAttrs($key, $value);

                return true;
            }
        }
        return true;


    }

    public function run()
    {
        if (!$this->currentRoute) {
            view("errors.404");
        }
        $this->handleAction($this->currentRoute);

    }
    public function handleAction($curRoute)
    {
        $action = $curRoute["action"] ?? null;
        if (!$action || is_numeric($action)) {
            return false;
        }
        if (is_callable($action)) {
            $action();
        }
        if (is_string($action)) {
            $action = explode("@", $action);
        }
        if (is_array($action)) {
            $className = self::BASE_CONTROLLER . $action[0];
            $method = $action[1];
            if (!$className || !class_exists($className)) {
                echo "class is not exists";
            }
            if (!$method || !method_exists($className, $method)) {
                echo "method is not exists";
            }
            $class = new $className($this->request);
            $class->{$method}();
        }
    }
}