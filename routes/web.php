<?php

use App\Controllers\UserController;
use App\Controllers\TopicController;

$app->get('/users', UserController::class . ':index');

$app->group('/topics', function() {
    $this->get('', TopicController::class . ':index');
    $this->get('/{id}', TopicController::class . ':show')->setName('topics.show');
});