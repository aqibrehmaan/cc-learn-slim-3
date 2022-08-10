<?php

use App\Controllers\UserController;
use App\Controllers\TopicController;
use App\Controllers\ExampleController;
use App\Middleware\RedirectIfUnauthenticated;

$app->get('/topics', TopicController::class . ':index');

// $app->get('/topics/{id}', TopicController::class . ':show')->setName('topics.show')->add(new RedirectIfUnauthenticated($container['router']));

$app->group('', function() {
    $this->get('/topics/create', TopicController::class . ':create');
    $this->get('/topics/{id}', TopicController::class . ':show');
})->add(new RedirectIfUnauthenticated($container['router']));

// example
// $app->group('', function() {
//     $this->get('/login', AuthController::class . ':login');
//     $this->get('/register', RegisterController::class . ':register');
// })->add(new RedirectIfAuthenticated($container['router']));

$app->get('/login', function() {
    return 'Login';
})->setName('login');
