<?php

namespace App;

use Symfony\Component\Yaml\Yaml;

class Router
{
    /**
     * @var array
     */
    private $routes;

    /**
     * @var Request
     */
    private $request;

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $file
     */
    public function loadYaml($file)
    {
        $routes = Yaml::parseFile($file);
        foreach($routes as $name => $route){
            $this->addRoute(new Route($name, $route["path"], $route["parameters"], $route["controller"], $route["action"], $route["defaults"] ?? []));
        }
    }

    /**
     * @param Route $route
     * @throws \Exception
     */
    public function addRoute(Route $route)
    {
        if(isset($this->routes[$route->getName()])) {
            throw new RouterException("Cette route existe déjà !");
        }
        $this->routes[$route->getName()] = $route;
    }

    /**
     * @return mixed
     * @throws RouterException
     */
    public function getRouteByRequest()
    {
        foreach($this->routes as $route) {
            if($route->match($this->request->getUri())) {
                return $route;
            }
        }
        throw new RouterException("Cette route n'existe pas !");
    }

    /**
     * @param string $routeName
     * @return Route
     * @throws RouterException
     */
    public function getRoute($routeName)
    {
        if(isset($this->routes[$routeName])) {
            return $this->routes[$routeName];
        }
        throw new RouterException("Cette route n'existe pas !");
    }
}