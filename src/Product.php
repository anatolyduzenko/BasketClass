<?php

namespace App;

abstract class Product
{
    public string $code = '';
    public float $price = 0;

    public function getPrice() {
        return $this->price;
    }

    public function getDiscountedPrice() {
        return round($this->price / 2, 2, PHP_ROUND_HALF_DOWN);
    }

    public function getCode() {
        return $this->code;
    }
}