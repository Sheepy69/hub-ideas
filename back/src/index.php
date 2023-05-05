<?php

use HubIdeas\Back\Controller\Auth\Login;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->post('/login', Login::class);

$app->run();