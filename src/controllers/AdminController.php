<?php

namespace Blog\Controllers;

use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use Blog\Models\PostModel;

class AdminController extends AbstractController
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
        return $this->render('views/admin.php', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    public function get(int $postId): string
    {
        $postModel = new PostModel();

        try {
            $post = $postModel->get($postId);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Post not found!'];
            return $this->render('views/error.php', $properties);
        }

        $properties = ['post' => $post];
        return $this->render('views/post.php', $properties);
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

    public function getByUser(): string
    {
        $postModel = new PostModel();

        $posts = $postModel->getByUser($this->customerId);

        $properties = [
            'posts' => $posts,
            'currentPage' => 1,
            'lastPage' => true
        ];
        return $this->render('views/posts.php', $properties);
    }

    public function borrow(int $postId): string
    {
        $postModel = new PostModel();

        try {
            $post = $postModel->get($postId);
        } catch (NotFoundException $e) {
            $params = ['errorMessage' => 'Post not found.'];
            return $this->render('views/error.php', $params);
        }

        if (!$post->getCopy()) {
            $params = ['errorMessage' => 'There are no copies left.'];
            return $this->render('views/error.php', $params);
        }

        try {
            $postModel->borrow($post, $this->customerId);
        } catch (DbException $e) {
            $params = ['errorMessage' => 'Error borrowing post.'];
            return $this->render('views/error.php', $params);
        }

        return $this->getByUser();
    }

    public function returnPost(int $postId): string
    {
        $postModel = new PostModel();

        try {
            $post = $postModel->get($postId);
        } catch (NotFoundException $e) {
            $params = ['errorMessage' => 'Post not found.'];
            return $this->render('views/error.php', $params);
        }

        $post->addCopy();

        try {
            $postModel->returnPost($post, $this->customerId);
        } catch (DbException $e) {
            $params = ['errorMessage' => 'Error borrowing post.'];
            return $this->render('views/error.php', $params);
        }

        return $this->getByUser();
    }
}
