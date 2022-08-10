<?php

use App\Controllers\UserController;
use App\Controllers\TopicController;
use App\Controllers\ExampleController;

$app->get('/users', UserController::class . ':index')->add(function($request, $response, $next) {
    $response->getBody()->write('Before');
    $response = $next($request, $response);
    $response->getBody()->write('After');

    return $response;
});


$app->group('/topics', function() {
    $this->get('', TopicController::class . ':index');
    $this->get('/{id}', TopicController::class . ':show')->setName('topics.show');
});