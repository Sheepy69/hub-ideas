<?php

namespace HubIdeas\Back\Controller;

use HubIdeas\Back\Model\Database\Db;

class AbstractController
{
    protected Db $db;

    public function __construct(
    )
    {
        $this->db = new Db();
    }
}