<?php

namespace Core;

class Router {

    private $routes = [];

    public function add($uri, $controller, $method){
        //        [] = Append
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }
    public function get($uri, $controller){
        $this->add($uri,$controller,'GET');
    }

    public function post($uri, $controller){
        $this->add($uri,$controller,'POST');
    }

    public function delete($uri, $controller){
        $this->add($uri,$controller,'DELETE');
    }

    public function patch($uri, $controller){
        $this->add($uri,$controller,'PATCH');
    }

    public function put($uri, $controller){
        $this->add($uri,$controller,'PUT');
    }

    public function route($uri, $method)
    {
        foreach($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
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



