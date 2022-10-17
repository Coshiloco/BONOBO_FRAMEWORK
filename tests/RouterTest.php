<?php

namespace Bonovo\Tests;

use Bonovo\HttpMethod;
use Bonovo\Router;
use PHPUnit\Framework\TestCase;


class RouterTest extends TestCase {

  public function test_resolve_basic_route_with_callback_action() {
    $uri = '/test';
    $action =  fn () => "test";
    $router = new Router();
    $router->get($uri,$action);
    
    /*para coger el valor de una propuedad de un enum seria -> value  */
    $this->assertEquals($action, $router->resolve($uri, HttpMethod::GET->value));
  }
  
  public function test_resolve_multiple_basic_route_with_callback_action() {
    // Aqui queremos validar varias rutas a la vez por lo que hacemos un array de rutas 
    $routes = [
        '/test' => fn () => "test",
        '/foo' => fn () => "foo",
        '/bar' => fn () => "bar",
        '/long/nested/route' => fn () => "long nested routes",
    ];
    
    // nos creamos un router
    
    $router = new Router();
    
    // nos lo recorremos con un for each
    
    foreach ($routes as $uri => $action) {
      $router->get($uri, $action);
    }
    
    foreach ($routes as $uri => $action) {
      $this->assertEquals($action, $router->resolve($uri, HttpMethod::GET->value));
    }
  }
  
  public function test_resolve_multiple_basic_route_with_callback_action_for_different_http_methods() {
    
    
    /*Lo primero es que vamos ha hacr un array de arrays  */
    $routes = [
      [HttpMethod::GET, "/test", fn () => "get"],
      [HttpMethod::POST, "/test", fn () => "post"],
      [HttpMethod::PUT, "/test", fn () => "put"],
      [HttpMethod::PATCH, "/test", fn () => "patch"],
      [HttpMethod::DELETE, "/test", fn () => "delete"],
      
      
      [HttpMethod::GET, "/random/test", fn () => "get"],
      [HttpMethod::POST, "/random/nested/test", fn () => "post"],
      [HttpMethod::PUT, "/put/random/route", fn () => "put"],
      [HttpMethod::PATCH, "/some/patch/route", fn () => "patch"],
      [HttpMethod::DELETE, "/d", fn () => "delete"],
    ];
    
    $router = new Router();
    
    // nos las recorremos 
    
    foreach ($routes as [$method, $uri, $action]) {
      // elmatch nos permite extraer cada metodo de la lista de routas
      // como el nombre del metodo coincide con el de la funcion no hace falta
      // aqui registramos las rutas 
      $router->{strtolower($method->value)}($uri, $action);
    }
    
    foreach ($routes as [$method, $uri, $action]) {
      //Aqui las testeamos
      $this->assertEquals($action, $router->resolve($uri, $method->value));
    }
  }

}