<?php
namespace Blog\Controllers;

use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use Blog\Models\PostModel;

class PostsController extends AbstractController
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
        return $this->render('views/posts.php', $properties);
    }

    public function getAll() : string
    {
        return $this->getAllWithPage(1);
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
    public function register()
    {
        if ($this->request->isGet()) {
            return $this->render('views/register.php', []);
        } else if ($this->request->isPost()) {
            $params = $this->request->getParams();

            $postModel = new PostModel();
            $properties = [
                'firstname' => $params->get('firstname'),
                'lastname' => $params->get('lastname'),
                'username' => $params->get('username'),
                'email' => $params->get('email'),
                'password' => $params->get('password')
            ];

            $postModel->register($properties);
            $username = $params->get('username');
            setcookie("user", "$username");

            $this->redirect("admin");
        }
    }

    function redirect($url)
    {
        ob_start();
        header('Location: ' . $url);
        ob_end_flush();
        die();
    }
}
