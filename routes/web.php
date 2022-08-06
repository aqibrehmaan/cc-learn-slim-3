<?php

use App\Controllers\UserController;
use App\Controllers\TopicController;
use App\Controllers\ExampleController;

$app->get('/users', UserController::class . ':index');

// $app->get('/store', ExampleController::class . ':store')->setName('topics.store');
// $app->get('/show/{id}', ExampleController::class . ':show')->setName('topics.show');

$app->group('/topics', function() {
    $this->get('', TopicController::class . ':index');
    $this->get('/{id}', TopicController::class . ':show')->setName('topics.show');
});