<?php

// Para la importacion ponemos el namespace que hemos creado
// Es decir cuando utilizamos una clase puede cogerla del namespace de donde lo comparten todas las clases 
namespace Bonovo;

use Bonovo\HttpNotFoundException;

class Router
{
    protected array $routes = [];
  
    public function __construct() {
        foreach (HttpMethod::cases() as $method){
            $this->routes[$method->value] = [];
        }
    }
    
    // definimos el resolve por aqui
    public function resolve(string $uri, string $method) {
        /*Se lo pasamos por parametro 
        para hacer los tests*/
        
        /* Si hay una ruta que no la puede coger lo que tenemos
        que hacer e sun ternario para que no caiga en error el programa */
        
        $action = $this->routes[$method][$uri] ?? null;
        
        if(is_null($action)){
            throw new HttpNotFoundException("No se ha encontrado la dirrecion de la ruta");
        }
        
        return $action;
    }
    
    public function get(string $uri, callable $action) {
        $this->routes[HttpMethod::GET->value][$uri] = $action;
    }
    
    public function post(string $uri, callable $action) {
        $this->routes[HttpMethod::POST->value][$uri] = $action;
    }
    
    public function put(string $uri, callable $action) {
        $this->routes[HttpMethod::PUT->value][$uri] = $action;
    }
    
    public function patch(string $uri, callable $action) {
        $this->routes[HttpMethod::PATCH->value][$uri] = $action;
    }
    
    public function delete(string $uri, callable $action) {
        $this->routes[HttpMethod::DELETE->value][$uri] = $action;
    }
}
