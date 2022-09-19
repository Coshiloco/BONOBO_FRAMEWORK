<?php

$router = new Router();

$router->get('/test', function() {
    return "GET OK";
});

$router->post('/test', function () {
    return "POST OK";
});

var_dump($router);