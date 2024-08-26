<?php

namespace App\Widgets;

use App\Product;

class RedWidget extends Product
{
    
    public function __construct() {
        $this->code = 'R01';
        $this->price = 32.95;
    }

}