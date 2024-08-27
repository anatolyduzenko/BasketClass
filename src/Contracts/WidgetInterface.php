<?php

namespace App\Contracts;

interface WidgetInterface
{
    public function getCode(): string;
    public function getPrice(): float;
    public function getDiscountedPrice(): float;
}
