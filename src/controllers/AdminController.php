<?php
namespace Blog\Controllers;

use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use Blog\Models\PostModel;

class AdminController extends AbstractController
{
    const PAGE_LENGTH = 4;

    public function getAllWithPage($page) : string
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

    public function getAll() : string
    {
        return $this->getAllWithPage(1);
    }

    public function get(int $postId) : string
    {
        $postModel = new PostModel();

        try {
            $post = $postModel->get($postId);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Post not found!'];
            return $this->render('views/error.php', $properties);
        }

        $properties = ['post' => $post];
        return $this->render('views/admin_post.php', $properties);
    }

    public function search() : string
    {
        $categories = $this->request->getParams()->getString('categories');
        $tags = $this->request->getParams()->getString('tags');

        $postModel = new PostModel();
        $posts = $postModel->search($categories, $tags);

        $properties = [
            'posts' => $posts,
            'currentPage' => 1,
            'lastPage' => true
        ];
        return $this->render('views/posts.php', $properties);
    }

    public function logout() : string
    {
        setcookie('user', '', time() - 5000);

        return $this->redirect("/");
    }
}
