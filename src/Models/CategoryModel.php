<?php
namespace Blog\Models;

use Blog\Domain\Post;
use Blog\Exceptions\DbException;
use Blog\Exceptions\NotFoundException;
use Blog\Utils\Password;
use PDO;
use Blog\Domain\Users;

class CategoryModel extends AbstractModel
{
    const CLASSNAME = '\Blog\Domain\Category';

    public function getAll() : array
    {
        $query = 'SELECT * FROM categories';
        $sth = $this->db->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }
}

