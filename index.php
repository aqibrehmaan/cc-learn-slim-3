<?php

require 'vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();

$container['greeting'] = function() {
    return 'Hello from the container';
};

$app->get('/', function() {
    echo $this->greeting;
});


$app->run();