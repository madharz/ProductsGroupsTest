<?php

namespace models;

class Product
{
    public int $id;
    public int $group_id;
    public string $name;
    public float $price;

    public function __construct($id, $group_id, $name, $price)
    {
        $this->id = $id;
        $this->group_id = $group_id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGroupId(): int
    {
        return $this->group_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

}