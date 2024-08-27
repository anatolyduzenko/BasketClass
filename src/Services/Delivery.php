<?php

namespace App\Services;

use App\Contracts\DeliveryInterface;

class Delivery implements DeliveryInterface
{
    public function getDeliveryAmount(float $orderAmount) :float 
    {
        if ($orderAmount < 50) { 
            return 4.95;
        } elseif ($orderAmount < 90) {  
            return 2.95;
        } else {
            return 0;
        }
    }
}
