<?php
namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;



class Router {

    private $routes = [];

    public function add($uri, $controller, $method){
        //        [] = Append
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }
    public function get($uri, $controller){
        return $this->add($uri,$controller,'GET');
    }

    public function post($uri, $controller){
        return $this->add($uri,$controller,'POST');
    }

    public function delete($uri, $controller){
        return $this->add($uri,$controller,'DELETE');
    }

    public function patch($uri, $controller){
        return $this->add($uri,$controller,'PATCH');
    }

    public function put($uri, $controller){
        return $this->add($uri,$controller,'PUT');
    }

    // Middleware
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // Middleware
                Middleware::resolve($route['middleware']);


                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }


    protected function abort($statusCode = 404){
        http_response_code($statusCode);

        require base_path("views/{$statusCode}.php");

        die();
    }


}

//function routeToController($uri, $routes){
//    if(array_key_exists($uri,$routes)){
//        require base_path($routes[$uri]);
//    }else{
//        abort();
//    }
//}
//



