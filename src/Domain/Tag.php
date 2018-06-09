<?php
namespace Blog\Domain;

class Tag
{
    private $id;
    private $name;
 //   private $tagged;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

/*     public function isTagged(): string
    {
        return $this->tagged;
    } */
}
