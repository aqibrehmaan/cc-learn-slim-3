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

$app->get('/', function($request, $response) {
    return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/users', function($request, $response) {
    return $this->view->render($response, 'users.twig');
})->setName('users.index');


$app->get('/contact', function($request, $response){
    return $this->view->render($response, 'contact.twig');
});

$app->post('/contact', function($request, $response){
    //echo $request->getParam('email');

    $params = $request->getParams();

    var_dump($params['email']);
    
})->setName('contact');


$app->run();