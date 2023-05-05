<?php

namespace HubIdeas\Back\Model\Database\User;

use HubIdeas\Back\Model\Database\Db;

class AbstractModel
{
    protected Db $db;

    public function __construct()
    {
        $this->db = new Db();
    }
}