<?php
namespace Blog\Controllers;

use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use Blog\Models\PostModel;
use Blog\Models\AdminModel;
use Blog\Models\TagModel;
use Blog\Models\CategoryModel;

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

        return $this->redirect("/blogg/");
    }

    public function newPost() : string
    {
        if ($this->request->isGet()) {

            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAll();

            $tagModel = new TagModel();
            $tags = $tagModel->getAll();

            $properties = [
                'categories' => $categories,
                'tags' => $tags
            ];

            return $this->render('views/admin_post.php', $properties);

        } else if ($this->request->isPost()) {
            $params = $this->request->getParams();

            var_dump($params);
            var_dump($_POST);

            $adminModel = new AdminModel();
            $properties = [
                'title' => $params->get('title'),
                'body' => $params->get('body'),
                'image_url' => $params->get('image_url'),
                'category' => $params->get('category'),
                'tags' => $params->get('tags')
            ];

            var_dump($properties);

            return $adminModel->newPost($properties);
        }
    }
    public function editPost() : string
    {

    }

    public function delete(int $postId) : string
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

}
