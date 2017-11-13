<?php

namespace Blog\Models;

use Blog\Domain\Post;
use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use PDO;
use Exeption;

class PostModel extends AbstractModel
{
    const CLASSNAME = '\Blog\Domain\Post';

    public function get(int $postId): Post
    {
        $query = 'SELECT * FROM posts WHERE id = :id';
        $sth = $this->db->prepare($query);
        $sth->execute(['id' => $postId]);

        $posts = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        if (empty($posts)) {
            throw new NotFoundException();
        }

        return $posts[0];
    }

    public function getAll(int $page, int $pageLength): array
    {
        $start = $pageLength * ($page - 1);

        $query = 'SELECT * FROM posts LIMIT :page, :length';
        $sth = $this->db->prepare($query);
        $sth->bindParam('page', $start, PDO::PARAM_INT);
        $sth->bindParam('length', $pageLength, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function search(string $categories, string $tags): array
    {
        $query = <<<SQL
SELECT * FROM posts
WHERE categories LIKE :categories AND tags LIKE :tags
SQL;
        $sth = $this->db->prepare($query);
        $sth->bindValue('categories', "%$categories%");
        $sth->bindValue('tags', "%$tags%");
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }
  public function register(array $formdata): string 
  {
$query = 'INSERT INTO users (firstname, lastname, username, email, password) VALUES (:firstname, :lastname, :username, :email, :password)';
$sth = $this->db->prepare($query);
$sth->bindParam(':firstname', $formdata['firstname']);
$sth->bindParam(':lasttname', $formdata['lastname']);
$sth->bindParam(':username', $formdata['username']);
$sth->bindParam(':email', $formdata['email']);
$sth->bindParam(':password', $formdata['password']);

$success = '';

if ($sth->execute()){
    $success = 'true';
}else{
    throw new Exeption ('Something went wrong');
}
return $success;
  }
}
