<?php
namespace Blog\Models;

use Blog\Domain\Admin;
use PDO;
use Exception;

class AdminModel extends AbstractModel
{
    const CLASSNAME = '\Blog\Domain\Admin';

    public function newPost(array $formdata) : string

    {
        $query = "INSERT INTO posts (title, body, date, image_url, category, tags) VALUES (:title, :body, :date, :image_url, :category, )";
        $sth = $this->db->prepare($query);
        $sth->bindParam(':title', $formdata['title']);
        $sth->bindParam(':body', $formdata['body']);
        $sth->bindParam(':date', $formdata['date']);
        $sth->bindParam(':image_url', $formdata['image_url']);
        $sth->bindParam(':category', $formdata['category']);


        $success = '';

        if ($sth->execute()) {
            $success = 'true';
        } else {
            throw new Exception('Something went wrong');
        }

        return $success;
    }




}