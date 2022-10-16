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
      [HttpMethod::GET],
      [HttpMethod::POST],
      [HttpMethod::PUT],
      [HttpMethod::PATCH],
      [HttpMethod::DELETE],
    ];
    
  
  }

}