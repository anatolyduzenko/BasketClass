<?php

namespace App\Widgets;

use App\Contracts\WidgetInterface;

class GreenWidget implements WidgetInterface
{
    
    public function getCode(): string
    {
        return 'G01';
    }

    public function getPrice(): float
    {
        return 24.95; 
    }

    public function getDiscountedPrice(): float
    {
        return 12.47; 
    }

}