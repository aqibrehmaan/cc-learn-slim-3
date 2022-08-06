<?php

namespace App\Controllers;

class ExampleController extends Controller
{

    public function store($request, $response)
    {
        // store topic
        return $response->withRedirect($this->c->router->pathFor('topics.show', ['id' => 5]));
    }

    public function show($request, $response, $args)
    {
        // show topic
        return 'Show topic ' . $args['id'];
    }
}