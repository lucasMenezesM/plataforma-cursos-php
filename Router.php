<?php
// Middlewares\Authorize.php
require basePath("Middlewares/Authorize.php");

class Router
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = require basePath("routes.php");
    }

    public function route($uri): void
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        foreach ($this->routes as $route) {


            // uri requested by user
            $uriSegments = explode("/", trim($uri, '/'));

            // Uri for each iteration
            $routeSegments = explode("/", trim($route["uri"], "/"));

            $match = true;

            if (count($uriSegments) === count($routeSegments) && $route["method"] === $requestMethod) {
                $params = [];
                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {
                    // if the uri's don't match and there is no param
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match("/\{(.+?)\}/", $routeSegments[$i])) {
                        $match = false;
                        break;
                    }

                    // Check for the param and add to params array
                    if (preg_match("/\{(.+?)\}/", $routeSegments[$i], $matches)) {
                        $params[$matches[$i]] = $uriSegments[$i];
                    }
                };

                if ($match) {
                    // Extract controller and controller method
                    inspect($route["middleware"]);
                    inspect(Session::get("user"));
                    Authorize::authorize($route["middleware"]);

                    require basePath("Controllers/" . $route["controller"] . ".php");
                    $controller = new $route['controller']();
                    $controllerMethod = $route["controllerMethod"];
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                }
            }
        }

        http_response_code(404);
        loadView("error", ["statusCode" => 404]);
    }

    // require basePath("Views/error.view.php");
    // loadView("error", ["statusCode" => 404]);
}
