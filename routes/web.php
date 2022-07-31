<?php

use App\Models\User;

$app->get('/', function() {
    $user = new User;
    var_dump($user);
});