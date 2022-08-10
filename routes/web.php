<?php

use App\Controllers\UserController;
use App\Controllers\TopicController;
use App\Controllers\ExampleController;

$authenticated = function($request, $response, $next) use ($container){

    // $response->getBody()->write('abc');

    if(!isset($_SESSION['user_id'])) {
        $response = $response->withRedirect($container->router->pathFor('login'));
    }

    return $next($request, $response);
};

$token = function ($request, $response, $next) {
    $request = $request->withAttribute('token', 'abc123');

    return $next($request, $response);
};

$app->get('/topics', TopicController::class . ':index');
$app->get('/topics/{id}', TopicController::class . ':show')->setName('topics.show')->add($authenticated)->add($token);

$app->get('/login', function() {
    return 'Login';
})->setName('login');
