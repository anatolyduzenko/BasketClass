<?php

namespace App\Widgets;

use App\Product;

class BlueWidget extends Product
{
    
    public function __construct() {
        $this->code = 'B01';
        $this->price = 7.95;
    }

}