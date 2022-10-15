<?php

require "./Router.php";

$router = new Router();

$router->get('/test', function() {
    return "GET OK";
});

$router->post('/test', function () {
    return "POST OK";
});

//var_dump($router);

// Para que me mande contenido http

try {
    $action = $router->resolve();
    print($action());
} catch (HttpNotFoundException $e) {
    print("Not Found");
    http_response_code(404);
}