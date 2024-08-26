<?php

namespace App\Widgets;

use App\Product;

class GreenWidget extends Product
{
    
    public function __construct() {
        $this->code = 'G01';
        $this->price = 24.95;
    }

}