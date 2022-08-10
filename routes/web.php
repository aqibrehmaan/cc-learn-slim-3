<?php

use App\Controllers\UserController;
use App\Controllers\TopicController;
use App\Controllers\ExampleController;
use App\Middleware\RedirectIfUnauthenticated;

$app->get('/topics', TopicController::class . ':index');
$app->get('/topics/{id}', TopicController::class . ':show')->setName('topics.show')->add(new RedirectIfUnauthenticated);

$app->get('/login', function() {
    return 'Login';
})->setName('login');
