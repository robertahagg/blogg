<?php
namespace Blog\Models;

use Blog\Domain\Post;
use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use Blog\Utils\Password;
use PDO;
use Exeption;
use Blog\Domain\Users;

class TagModel extends AbstractModel
{
    const CLASSNAME = '\Blog\Domain\Tag';

    public function getAll() : array
    {
        $query = 'SELECT * FROM tags';
        $sth = $this->db->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }
}
