<?php

namespace Blog\Domain\Customer;

use Blog\Domain\Customer;
use Blog\Domain\Person;

class Basic extends Person implements Customer {
    public function getMonthlyFee() {
        return 5.0;
    }

    public function getAmountToBorrow() {
        return 3;
    }

    public function getType() {
        return 'Basic';
    }

    public function pay($amount) {
        echo "Paying $amount.";
    }

    public function isExtentOfTaxes() {
        return false;
    }
}