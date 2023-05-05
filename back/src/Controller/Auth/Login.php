<?php

namespace HubIdeas\Back\Controller\Auth;

use HubIdeas\Back\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Login extends AbstractController
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // your code to access items in the container... $this->container->get('');
        // TODO : get && check params
        // TODO : check login params are good
        // TODO : return token
        if(isset($request->getQueryParams()['username']))
        $response->getBody()->write("Login");
        return $response;
    }
}