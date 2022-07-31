<?php

namespace App\Controllers;

class TopicController extends Controller
{

    public function index($request, $response)
    {
        return $this->c->view->render($response, 'topics/index.twig');
    }

    public function show()
    {
        return 'Show single topic';
    }
}