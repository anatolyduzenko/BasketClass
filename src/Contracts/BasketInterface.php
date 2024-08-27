<?php

namespace App\Contracts;

interface BasketInterface
{
    public function addProduct(string $code): void;
    public function totalCost(): float;
    public function getProducts(): array;
}
