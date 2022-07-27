<?php

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();

$container['db'] = function() {
    return new PDO('mysql:host=localhost;dbname=learn-slim-3', 'root', '');
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ .'/resources/views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};


$app->get('/', function($request, $response) {
    $users = $this->db->query('SELECT * FROM Users')->fetchAll(PDO::FETCH_OBJ);

    var_dump($users);
});

$app->run();