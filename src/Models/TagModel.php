<?php
namespace Blog\Models;

use PDO;

class TagModel extends AbstractModel
{
    const CLASSNAME = '\Blog\Domain\Tag';

    public function getAll(): array
    {
        $query = 'SELECT * FROM tags';
        $sth = $this->db->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function getTagsOfPost($post_id): array
    {
        $query = 'SELECT * FROM tagsposts WHERE post_Id=:post_Id';
        $sth = $this->db->prepare($query);
        $sth->execute(['post_Id' => $post_id]);

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }
}
