<?php

namespace Main\core;

use Main\core\Database;

namespace Main\core;

abstract class BaseModel
{
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected function query($sql)
    {
        $this->db->query($sql);
    }

    protected function bind($param, $value)
    {
        $this->db->bind($param, $value);
    }

    protected function all()
    {
        return $this->db->results();
    }

    protected function one()
    {
        return $this->db->single();
    }

    protected function execute()
    {
        return $this->db->execute();
    }
}
