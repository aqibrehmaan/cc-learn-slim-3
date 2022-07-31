<?php

use App\Controllers\TopicController;

// $app->get('/topics', '\App\Controllers\TopicController:index');
// $app->get('/topics/{id}', '\App\Controllers\TopicController:show');

// $app->get('/topics', TopicController::class . ':index');
// $app->get('/topics/{id}', TopicController::class . ':show');

$app->group('/topics', function() {
    $this->get('', TopicController::class . ':index');
    $this->get('/{id}', TopicController::class . ':show');
});