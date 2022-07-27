<?php

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();

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

$app->group('/topics', function() {
    $this->get('', function() {
        echo 'Topic list';
    });

    $this->get('/{id}', function() {
        echo 'Topic' . $args['id'];
    });

    $this->post('', function() {
        echo 'Post topic';
    });
});

$app->get('/contact', function($request, $response) {
    return $this->view->render($response, 'contact.twig');
});

$app->run();