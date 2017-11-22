<?php
namespace Blog\Domain;

class Tag
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
