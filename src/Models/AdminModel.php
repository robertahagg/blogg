<?php
namespace Blog\Models;

use Exception;

class AdminModel extends AbstractModel
{
    const CLASSNAME = '\Blog\Domain\Admin';

    public function newPost(array $formdata): string
    {
        $query = "INSERT INTO posts (title, body, image_url, category) VALUES (:title, :body, :image_url, :category)";
        $sth = $this->db->prepare($query);
        $sth->bindParam(':title', $formdata['title']);
        $sth->bindParam(':body', $formdata['body']);
        //     $sth->bindParam(':date', $formdata['date']);
        $sth->bindParam(':image_url', $formdata['image_url']);
        $sth->bindParam(':category', $formdata['category']);

        $success = '';

        if ($sth->execute()) {
            $success = 'true';
        } else {
            var_dump($sth->errorCode());
            var_dump($sth->errorInfo()); // Prints information about what went wrong.
            throw new Exception('Something went wrong');
        }
        //skapa en insert query för tags_posts tabellen

        $this->storeTags($this->db->lastInsertId(), $formdata['tags']);

        return $success;
    }

    private function storeTags($postId, array $tagArray)
    {
/*
In tags 2, 5, 6, 4
In post id 88

Add rows:
88 2
88 5
88 6
88 4
 */

        foreach ($tagArray as $i => $tagId) {
            $query = "INSERT INTO tagsposts (post_Id, tags_Id) VALUES (:postid, :tagid)";
            $sth = $this->db->prepare($query);
            $sth->bindParam(':postid', $postId);
            $sth->bindParam(':tagid', $tagId);

            $success = '';

            if ($sth->execute()) {
                $success = 'true';
            } else {
                var_dump($sth->errorCode());
                var_dump($sth->errorInfo()); // Prints information about what went wrong.
                throw new Exception('Something went wrong');
            }
        }

        return $success;
    }
}
