<?php

namespace Blog\Domain\Customer;

use Blog\Domain\Customer;
use Blog\Domain\Person;

class Premium extends Person implements Customer {
    public function getMonthlyFee() {
        return 10.0;
    }

    public function getAmountToBorrow() {
        return 10;
    }

    public function getType() {
        return 'Premium';
    }

    public function pay($amount) {
        echo "Paying $amount.";
    }

    public function isExtentOfTaxes() {
        return true;
    }
}