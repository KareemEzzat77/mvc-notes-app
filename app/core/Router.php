<?php

namespace Main\core;

class Router
{
    protected array $routes = [];

    public function get($uri, $action)
    {
        return $this->add('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        return $this->add('POST', $uri, $action);
    }

    protected function add($method, $uri, $action)
    {
        $this->routes[] = [
            'method'     => $method,
            'uri'        => trim($uri, '/'),
            'action'     => $action,
            'middleware' => []
        ];

        return $this;
    }

    public function middleware($middlewares)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = (array)$middlewares;
        return $this;
    }

    public function dispatch()
    {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {

            if ($route['method'] !== $method) {
                continue;
            }

            $pattern = $this->convertToRegex($route['uri']);

            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches); // remove full match

                // Middleware
                foreach ($route['middleware'] as $middleware) {
                    (new $middleware(...$matches))->handle();
                }

                return $this->callAction($route['action'], $matches);
            }
        }
        abort(404);
    }

    protected function callAction($action, $params)
    {
        [$controller, $method] = explode('@', $action);

        $controllerClass = "Main\\controllers\\{$controller}";
        $controllerInstance = new $controllerClass;

        return call_user_func_array(
            [$controllerInstance, $method],
            $params
        );
    }

    protected function convertToRegex($uri)
    {
        // note/{id}/edit → note/([0-9]+)/edit
        $uri = preg_replace('#\{[a-zA-Z_]+\}#', '([0-9]+)', $uri);

        return '#^' . $uri . '$#';
    }
}
