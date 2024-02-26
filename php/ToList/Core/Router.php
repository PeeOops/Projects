<?php

namespace Core;

class Router{
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


    public function route($uri){
        foreach($this->routes as $route){
            if($route['uri'] === $uri){
                // Grab the controller directory
                return require base_path('Http/controllers/' . $route['controller']);
            }
        }
        
        abort();
    }

}