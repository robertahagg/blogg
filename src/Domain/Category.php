<?php
namespace Blog\Domain;

class Category
{
    private $id;
    private $name;


    public function getId() : int
    {
        return $this->id;
    }


    public function getName() : string
    {
        return $this->name;
    }
}
