<?php

namespace HubIdeas\Back\Model\Database;

class AbstractModel
{
    protected Db $db;

    public function __construct()
    {
        $this->db = new Db();
    }
}