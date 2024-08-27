<?php

namespace App\Contracts;

interface DeliveryInterface
{
    public function getDeliveryAmount(float $total): float;
}
