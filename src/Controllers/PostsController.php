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

    public function getAllWithPage($page, $categoryId, $tagId): string
    {
        $page = (int) $page;
        $postModel = new PostModel();
        $tagModel = new TagModel();

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        if($tagId == null) {
            $posts = $postModel->getAll($page, self::PAGE_LENGTH, $categoryId);
        }
        else {
            $posts = $postModel->getAllByTag($page, self::PAGE_LENGTH, $tagId);
        }

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
        return $this->getAllWithPage($page, $categoryId, null);
    }

    public function getAllByTagWithPage($tagId, $page): string
    {
        return $this->getAllWithPage($page, null, $tagId);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1, null, null);
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
}
