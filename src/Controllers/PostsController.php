<?php
namespace Blog\Controllers;

use Blog\Controllers\PostsController;
use Blog\Models\CategoryModel;
use Blog\Models\PostModel;
use Blog\Models\TagModel;

class PostsController extends AbstractController
{
    const PAGE_LENGTH = 4;

    public function handleRequest(): string
    {
        if ($this->request->isGet()) {
            return $this->getAll();
        } else if ($this->request->isPost()) {
            return $this->login();
        }
    }

    public function getAllWithPage($page, $categoryId): string
    {
        $page = (int) $page;
        $postModel = new PostModel();
        $tagModel = new TagModel();

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        $posts = $postModel->getAll($page, self::PAGE_LENGTH, $categoryId);

        $properties = [
            'posts' => $posts,
            'tagModel' => $tagModel,
            'categories' => $categories,
            'currentPage' => $page,
            'isLastPage' => count($posts) < self::PAGE_LENGTH,
        ];

        return $this->render('views/posts.php', $properties);
    }

    public function getAllByCategoryWithPage($categoryId, $page): string
    {
        return $this->getAllWithPage($page, $categoryId);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1, null);
    }

    public function search(): string
    {
        $tags = $this->request->getParams()->getString('tags');

        $postModel = new PostModel();
        $posts = $postModel->search($tags);

        $properties = [
            'posts' => $posts,
            'currentPage' => 1,
            'lastPage' => true,
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
                'password' => $params->get('password'),
            ];

            $postModel->register($properties);
            $username = $params->get('username');
            setcookie("user", "$username");

            $this->redirect("admin");
        }
    }

    public function login() : string
    {
        if (!$this->request->isPost()) {
            $params = ['errorMessage' => 'Method not allowed.'];
            return $this->render('views/posts.php', $params);
        }

        $params = $this->request->getParams();
        if (!$params->has('username', 'password')) {
            $params = ['errorMessage' => 'Missing login details, please check entered fields.'];
            return $this->render('views/posts.php', $params);
        }

        $username = $params->getString('username');
        $password = $params->getString('password');
        $postModel = new PostModel();

        $userExist = $postModel->hasUserWithPassword($username, $password);

        if ($userExist) {
            setcookie('user', $username);
            $this->redirect("admin");
        } else {
            $params = ['ErrorMessage' => 'Username not found.'];
            return $this->render('views/posts.php', $params);
        }
    }
}
