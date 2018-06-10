<?php
namespace Blog\Controllers;

use Blog\Models\AdminModel;
use Blog\Models\CategoryModel;
use Blog\Models\PostModel;
use Blog\Models\TagModel;

class AdminController extends AbstractController
{
    const PAGE_LENGTH = 40;

    public function getAllWithPage($page): string
    {
        $page = (int) $page;
        $postModel = new PostModel();

        $posts = $postModel->getAll($page, self::PAGE_LENGTH);

        $properties = [
            'posts' => $posts,
            'currentPage' => $page,
            'lastPage' => count($posts) < self::PAGE_LENGTH,
        ];
        return $this->render('views/admin.php', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    public function get(int $postId): string
    {
        if ($this->request->isPost()) {
            $params = $this->request->getParams();

            $adminModel = new AdminModel();
            $properties = [
                'title' => $params->get('title'),
                'body' => $params->get('body'),
                'image_url' => $params->get('image_url'),
                'category' => $params->get('category'),
                'tags' => $params->get('tags'),
            ];

            $adminModel->updatePost($postId, $properties);

            return $this->redirect("/admin");
        }

        $postModel = new PostModel();

        try {
            $post = $postModel->get($postId);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Post not found!'];
            return $this->render('views/error.php', $properties);
        }

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        $tagModel = new TagModel();
        $tags = $tagModel->getAll();
        $taggedTags = $tagModel->getTagsOfPost($postId);

        $properties = ['post' => $post,
            'categories' => $categories,
            'taggedTags' => $taggedTags,
            'tags' => $tags];

        return $this->render('views/admin_post.php', $properties);
    }

    public function search(): string
    {
        $categories = $this->request->getParams()->getString('tags');
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

    public function logout(): string
    {
        setcookie('user', '', time() - 5000);

        return $this->redirect("/");
    }

    public function newPost(): string
    {
        if ($this->request->isPost()) {
            $params = $this->request->getParams();

            $adminModel = new AdminModel();
            $properties = [
                'title' => $params->get('title'),
                'body' => $params->get('body'),
                'image_url' => $params->get('image_url'),
                'category' => $params->get('category'),
                'tags' => $params->get('tags'),
            ];

            $adminModel->newPost($properties);
        }

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        $tagModel = new TagModel();
        $tags = $tagModel->getAll();

        $properties = [
            'categories' => $categories,
            'tags' => $tags,
        ];

        return $this->render('views/new_post.php', $properties);
    }

    public function delete(int $postId): string
    {
        if ($this->request->isPost()) {
            $postModel = new PostModel();

            try {
                $postModel->delete($postId);
            } catch (\Exception $e) {
                $properties = ['errorMessage' => 'Post not found!'];
                return $this->render('views/error.php', $properties);
            }

            return $this->redirect("/admin");
        }
    }

    public function login(): string
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
            $params = ['ErrorMessage' => 'Wrong username or password.'];
            return $this->render('views/posts.php', $params);
        }
    }
}
