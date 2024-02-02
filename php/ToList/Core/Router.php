<?php

namespace Core;

class Router{
    private $routes = [];

    public function get($uri,$controller){
       $this->routes[] = [
        'uri' => $uri,
        'controller' => $controller
       ];

       return $this;
    }

    public function post($uri, $controller){
        $this->routes[] = [
        'uri' => $uri,
        'controller' => $controller
       ];

       return $this;

    }

    public function delete($uri, $controller){

    }

    public function put(){

    }

    public function patch(){

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