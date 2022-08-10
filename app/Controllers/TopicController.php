<?php

namespace App\Controllers;

use PDO;
use App\Models\Topic;

class TopicController extends Controller
{

    public function index($request, $response)
    {
        return 'Topic index';
    }

    public function show($request, $response, $args)
    {  
       echo $request->getAttribute('token');
       die();
       return $args['id'];
    }

    public function create($request, $response, $args) {
        return 'Create';
    }
}