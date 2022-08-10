<?php


namespace App\Middleware;

class RedirectIfUnauthenticated
{
    public function __invoke($request, $response, $next)
    {
       
        if(!isset($_SESSION['user_id'])) {
            // Redirect not working 
            $response = $response->withRedirect('http://localhost/codecourse/slim/learn-slim-3/public/login');
        }
    
        return $next($request, $response);
    }
}