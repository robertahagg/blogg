<?php

namespace Blog\Domain;

class Post {
    private $id;
    private $title;
    private $body;
    private $date;
    

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getBody(): string {
        return $this->body;
    }

    public function getDate(): int {
        return $this->date;
    }   
}
