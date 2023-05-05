<?php

namespace HubIdeas\Middleware;

class Authentified extends AbstractMiddleware
{
    public function __invoke($request, $response, $next)
    {
        // TODO : check token param
        if (isset($request->getQueryParams()['token'])) {

        }

        // TODO : check user is authenticated
        return $response;
    }
}