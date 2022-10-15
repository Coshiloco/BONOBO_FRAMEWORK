<?php

require "./Router.php";

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
    $action = $router->resolve();
    print($action());
} catch (HttpNotFoundException $e) {
    print($e->getMessage());
    http_response_code(404);
}