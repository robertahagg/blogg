<?php
namespace Blog\Domain;

class Post
{
    private $id;
    private $title;
    private $body;
    private $date;
    private $image_url;
    private $categories;
    private $tags;




    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getBody() : string
    {
        return $this->body;
    }

    public function getDate() : string
    {
        return $this->date;
    }

    public function getImageUrl() : string
    {
        return $this->image_url;
    }

    public function getCategories() : string
    {
        return $this->categories;
    }

    public function getTags() : string
    {
        return $this->tags;
    }
}
