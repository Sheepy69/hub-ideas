<?php

namespace HubIdeas\Middleware;

class CheckAppRequiredConfig extends \HubIdeas\Middleware\AbstractMiddleware
{
    public function __invoke($request, $response, $next)
    {
        // TODO : check user is authenticated
        $response->getBody()->write('BEFORE');
        $response = $next($request, $response);
        $response->getBody()->write('AFTER');

        return $response;
    }
}