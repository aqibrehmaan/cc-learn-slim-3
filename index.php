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

$app->get('/contact', function($request, $response) {
    return $this->view->render($response, 'contact.twig');
});

$app->get('/contact/confirm', function($request, $response) {
    return $this->view->render($response, 'contact_confirm.twig');
});

$app->post('/contact', function($request, $response) {
    return $response->withRedirect('http://localhost/codecourse/slim/learn-slim-3/contact/confirm');
})->setName('contact');

$app->get('/users/{id}', function($request, $response, $args) {
   // var_dump($args);

   $user = [
     'id' => $args['id'],
     'username' => 'alex'
   ];

//    return $this->view->render($response, 'user.twig', [
//      'user' => $user
//    ]);

    return $this->view->render($response, 'user.twig', compact('user'));

});

// $app->get('/users[/{id}]', function($request, $response, $args) {
//     var_dump($args);
// });


$app->run();