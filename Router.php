<?php

require "./HttpMethod.php";

class Router
{
    protected array $routes = [];
  
    public function __construct() {
        foreach (HttpMethod::cases() as $method){
            $this->routes[$method->value] = [];
        }
    }
    
    public function get(string $uri, callable $action) {
        $this->routes[HttpMethod::GET->value][$uri] = $action;
    }
}
