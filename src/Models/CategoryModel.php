<?php
namespace Blog\Models;

use PDO;

class CategoryModel extends AbstractModel
{
    const CLASSNAME = '\Blog\Domain\Category';

    public function getAll(): array
    {
        $query = 'SELECT * FROM categories';
        $sth = $this->db->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }
}
