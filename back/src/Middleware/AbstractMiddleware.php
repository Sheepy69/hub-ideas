<?php

namespace HubIdeas\Middleware;

use HubIdeas\Back\Model\Database\Db;

class AbstractMiddleware
{
    protected Db $db;

    public function __construct()
    {
        $this->db = new Db();
    }
}