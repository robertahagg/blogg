<?php

namespace Blog\Domain;

class Sale {
    private $id;
    private $customer_id;
    private $posts;
    private $date;

    public function setCustomerId(int $customerId) {
        $this->customer_id = $customerId;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getPosts(): array {
        return $this->posts;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function addPost(int $postId, int $amount = 1) {
        if (!isset($this->posts[$postId])) {
            $this->posts[$postId] = 0;
        }
        $this->posts[$postId] += $amount;
    }

    public function setPosts(array $posts) {
        $this->posts = $posts;
    }
}
