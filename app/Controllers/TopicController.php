<?php

namespace App\Controllers;

use PDO;
use App\Models\Topic;

class TopicController extends Controller
{

    public function index($request, $response)
    {

        $topics = $this->c->db->query('SELECT * FROM topics')->fetchAll(PDO::FETCH_CLASS, Topic::class);

        return $this->c->view->render($response, 'topics/index.twig', compact('topics'));
    }

    public function show($request, $response, $args)
    {
        
        $topic = $this->c->db->prepare('SELECT * FROM topics WHERE id = :id');

        $topic->execute([
            'id' => $args['id']
        ]);

        $topic = $topic->fetch(PDO::FETCH_OBJ);

        return $this->c->view->render($response, 'topics/show.twig', compact('topic'));
    }
}