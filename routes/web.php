<?php

use App\Middleware\IpFilter;
use App\Controllers\UserController;
use App\Controllers\TopicController;
use App\Controllers\ExampleController;
use App\Middleware\RedirectIfUnauthenticated;

$app->add(new IpFilter($container['db']));

$app->get('/', function () {
    return 'Home';
});


$app->get('/login', function () {
    return 'Login';
}); 