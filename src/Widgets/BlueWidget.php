<?php

namespace App\Widgets;

use App\Contracts\WidgetInterface;

class BlueWidget implements WidgetInterface
{
    
    public function getCode(): string
    {
        return 'B01';
    }

    public function getPrice(): float
    {
        return 7.95; 
    }

    public function getDiscountedPrice(): float
    {
        return 3.97; 
    }

}