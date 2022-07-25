<?php

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', function() {
    echo 'Home';
});

$app->get('/users', function() {
    echo 'Users';
});

$app->run();