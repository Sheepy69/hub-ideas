<?php

namespace HubIdeas\Back\Controller\Auth;

use HubIdeas\Back\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Installation extends AbstractController
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // your code to access items in the container... $this->container->get('');
        // TODO : check installation is required
        return $response;
    }
}