<?php

session_start();

unset($_SESSION['user_id']);

require __DIR__ .'/../vendor/autoload.php';

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
    $view = new \Slim\Views\Twig(__DIR__ .'/../resources/views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

// $container['notFoundHandler'] = function($c) {
//     return function($request, $response) {
//         return $response->withStatus(404)->write('Not found');
//     };
// };

$container['notFoundHandler'] = function($c) {
    return function($request, $response) use ($c){
        return $c->view->render($response, 'errors/404.twig')->withStatus(404);
    };
};

require __DIR__ .'/../routes/web.php';