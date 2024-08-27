<?php

namespace App\Widgets;

use App\Contracts\WidgetInterface;

class RedWidget implements WidgetInterface
{
    
    public function getCode(): string
    {
        return 'R01';
    }

    public function getPrice(): float
    {
        return 32.95; 
    }

    public function getDiscountedPrice(): float
    {
        return 16.47; 
    }

}