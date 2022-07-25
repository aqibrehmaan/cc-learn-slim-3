<?php

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();


$app->get('/', function() {
    echo $this->nothing;
});


$app->run();