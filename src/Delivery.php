<?php

namespace App;

class Delivery
{
    public function getDeliveryAmount(float $orderAmount) :float 
    {
        if ($orderAmount < 50) { 
            return 4.95;
        } elseif ($orderAmount >= 50 && $orderAmount < 90) {  
            return 2.95;
        } elseif ($orderAmount >= 90) {
            return 0;
        }
    }
}