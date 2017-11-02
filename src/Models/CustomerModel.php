<?php

namespace Blog\Models;

use Blog\Domain\Customer;
use Blog\Domain\Customer\CustomerFactory;
use Blog\Exceptions\NotFoundException;
use PDO;

class CustomerModel extends AbstractModel
{
    const CLASSNAME = '\Blog\Domain\Customer\CustomerFactory';

    public function get(int $customerId): CustomerFactory
    {
        $query = 'SELECT * FROM customers WHERE id = :id';
        $sth = $this->db->prepare($query);
        $sth->execute(['id' => $customerId]);

        $customers = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        if (empty($customers)) {
            throw new NotFoundException();
        }

        return $customers[0];
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM customers';
        $sth = $this->db->prepare($query);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

        if (empty($row)) {
            throw new NotFoundException();
        }

        return CustomerFactory::factory(
            $row['type'],
            $row['id'],
            $row['firstname'],
            $row['surname'],
            $row['email']
        );
    }
}
