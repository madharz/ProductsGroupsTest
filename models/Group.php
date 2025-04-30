<?php

namespace models;

class Group
{
    public int $id;
    public int $parent_id;
    public string $name;

    public function __construct($id, $parent_id, $name)
    {
        $this->id = $id;
        $this->parent_id = $parent_id;
        $this->name = $name;
    }
}