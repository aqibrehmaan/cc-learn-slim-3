<?php

namespace App\Controllers;

use PDO;
use App\Models\Topic;

class TopicController extends Controller
{

    public function index($request, $response)
    {

        $topics = $this->c->db->query('SELECT * FROM topics')->fetchAll(PDO::FETCH_CLASS, Topic::class);

        // return $response->withHeader('Content-Type', 'application/json')->write(json_encode($topics));

        if(true) 
        {

            // return $response->withHeader('Content-Type', 'application/json')->withStatus(404)->write(json_encode([
            //     'error' => 'That topic does not exist'
            // ]));   
            
            return $response->withJson([
                'error' => 'That topic does not exist'
            ], 404);
            
        }

        return $response->withJson($topics, 200);
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