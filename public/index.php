<?php

// Para que funciona el espacio de nombres tenemos que utilizar el autoload de composer
require_once "../vendor/autoload.php";

use Bonovo\HttpNotFoundException;
use Bonovo\Router;

$router = new Router();

$router->get('/test', function() {
    return "GET OK";
});

$router->post('/test', function () {
    return "POST OK";
});

$router->put('/testdelorangutan', function () {
    return "PUT OK";
});

$router->patch('/testpatch', function() {
    return "PATCH OK";
});

$router->delete('/testdelete', function() {
    return "DELETE OK";
});
//var_dump($router);

// Para que me mande contenido http

try {
    $action = $router->resolve($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
    print($action());
} catch (HttpNotFoundException $e) {
    print($e->getMessage());
    http_response_code(404);
}