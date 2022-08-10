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
        
        $topic = $this->c->db->prepare('SELECT * FROM topics WHERE id = :id');

        $topic->execute([
            'id' => $args['id']
        ]);

        $topic = $topic->fetch(PDO::FETCH_OBJ);

        if($topic === false) 
        {
            return $this->render404($response);
        }

        return $this->c->view->render($response, 'topics/show.twig', compact('topic'));
    }
}