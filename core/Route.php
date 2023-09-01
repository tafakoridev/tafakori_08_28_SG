<?php

namespace Core;

class Route {
    private static $routes = [];

    public static function get($uri, $controllerMethod) {
        self::addRoute('GET', $uri, $controllerMethod);
    }

    public static function post($uri, $controllerMethod) {
        self::addRoute('POST', $uri, $controllerMethod);
    }

    public static function put($uri, $controllerMethod) {
        self::addRoute('PUT', $uri, $controllerMethod);
    }

    public static function delete($uri, $controllerMethod) {
        self::addRoute('DELETE', $uri, $controllerMethod);
    }

    private static function addRoute($method, $uri, $controllerMethod) {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controllerMethod' => $controllerMethod
        ];
    }


  

    public static function dispatch($requestMethod, $uri) {
        $matched = false;
        foreach (self::$routes as $route) {
            if ($route['method'] === $requestMethod && self::uriMatches($route['uri'], $uri)) {
                $matched = true;
                [$controllerName, $methodName] = explode('@', $route['controllerMethod']);
                $controllerClass = "App\\Controllers\\{$controllerName}";
                $controller = new $controllerClass();
                $uriParams = self::extractUriParams($route['uri'], $uri);
                $controller->$methodName(...$uriParams);
                break;
            }
        }

        if (!$matched) {
            http_response_code(404);
            echo "404 - Page not found";
        }
    }

    private static function extractUriParams($routeUri, $requestUri) {
        $routeSegments = explode('/', $routeUri);
        $requestSegments = explode('/', $requestUri);
    
        $uriParams = [];
        foreach ($routeSegments as $index => $segment) {
            if (strpos($segment, '{') === 0 && strpos($segment, '}') === strlen($segment) - 1) {
                $paramName = trim($segment, '{}');
                $uriParams[] = $requestSegments[$index];
            }
        }
    
        return $uriParams;
    }

    private static function uriMatches($routeUri, $requestedUri) {
        $routeUriSegments = explode('/', trim($routeUri, '/'));
        $requestedUriSegments = explode('/', trim($requestedUri, '/'));

        if (count($routeUriSegments) !== count($requestedUriSegments)) {
            return false;
        }

        for ($i = 0; $i < count($routeUriSegments); $i++) {
            $routeSegment = $routeUriSegments[$i];
            $requestedSegment = $requestedUriSegments[$i];

            if (strpos($routeSegment, '{') === 0 && strpos($routeSegment, '}') === strlen($routeSegment) - 1) {
                // Placeholder found, extract parameter name
                $paramName = trim($routeSegment, '{}');

                // Validate parameter using regular expression (alphanumeric characters)
                if (!preg_match('/^[a-zA-Z0-9]+$/', $requestedSegment)) {
                    return false;
                }
            } elseif ($routeSegment !== $requestedSegment) {
                return false;
            }
        }

        return true;
    }
}
