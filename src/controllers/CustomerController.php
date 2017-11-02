<?php

namespace Bookstore\Controllers;

use Bookstore\Exceptions\NotFoundException;
use Bookstore\Models\CustomerModel;

class CustomerController extends AbstractController
{
    public function getAll(): string
    {
        $customerModel = new CustomerModel();

        $customers = $customerModel->getAll();

        $properties = [
            'customers' => $customers
        ];

        return $this->render('views/customers.php', $properties);
    }

    public function get(int $customerId): string
    {
        $customerModel = new customerModel();

        try {
            $customer = $customerModel->get($customerId);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Customer not found!'];
            return $this->render('views/customer.php', $properties);
        }

        $properties = ['customer' => $customer];
        return $this->render('views/customer.php', $properties);
    }
}
