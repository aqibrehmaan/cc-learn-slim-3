<?php


namespace App\Middleware;

use Slim\Interfaces\RouterInterface;
use Psr\Container\ContainerInterface;

class RedirectIfUnauthenticated
{   
    // protected $c;

    // public function __construct(ContainerInterface $c)
    // {
    //     $this->c = $c;
    // }

    protected $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function __invoke($request, $response, $next)
    {
       
        if(!isset($_SESSION['user_id'])) {
    
           $response = $response->withRedirect($this->router->pathFor('login'));
            
            return $response;
        }
    
        return $next($request, $response);
    }
}