<?php

namespace Blog\Controllers;

use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use Blog\Models\PostModel;

class PostsController extends AbstractController
{
    const PAGE_LENGTH = 4;

    public function getAllWithPage($page): string
    {
        $page = (int)$page;
        $postModel = new PostModel();

        $posts = $postModel->getAll($page, self::PAGE_LENGTH);

        $properties = [
            'posts' => $posts,
            'currentPage' => $page,
            'lastPage' => count($posts) < self::PAGE_LENGTH
        ];
        return $this->render('views/posts.php', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    public function search(): string
    {
        $title = $this->request->getParams()->getString('title');
        $author = $this->request->getParams()->getString('author');

        $postModel = new PostModel();
        $posts = $postModel->search($title, $author);

        $properties = [
            'posts' => $posts,
            'currentPage' => 1,
            'lastPage' => true
        ];
        return $this->render('views/posts.php', $properties);
    }
}
