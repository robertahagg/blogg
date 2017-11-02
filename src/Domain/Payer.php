<?php

namespace Blog\Domain;

interface Payer {
    public function pay($amount);
    public function isExtentOfTaxes();
}