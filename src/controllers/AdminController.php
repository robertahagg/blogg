<?php
namespace Blog\Controllers;

use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use Blog\Models\PostModel;
use Blog\Models\AdminModel;

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
        $categories = $this->request->getParams()->getString('tags');
        $tags = $this->request->getParams()->getString('tags');

        $postModel = new PostModel();
        $posts = $postModel->search($tags);

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

    public function newPost() : string
    {
        if ($this->request->isGet()) {
            return $this->render('views/admin_post.php', []);
        } else if ($this->request->isPost()) {
            $params = $this->request->getParams();

            $adminModel = new AdminModel();
            $properties = [
                'title' => $params->get('title'),
                'body' => $params->get('body'),
                'date' => $params->get('date'),
                'image_url' => $params->get('image_url'),
                'categories' => $params->get('categories'),
                'tags' => $params->get('tags')
            ];

            var_dump($properties);

            return $adminModel->newPost($properties);
        }
    }
}
