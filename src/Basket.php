<?php

namespace App;

use App\Widgets\BlueWidget;
use App\Widgets\GreenWidget;
use App\Widgets\RedWidget;
use Exception;

class Basket
{
    private $items = [];
    private $widgets = [];
    private $specialOffers = [];

    public function __construct() {
        $this->widgets = [
            'R01' => new RedWidget,
            'G01' => new GreenWidget,
            'B01' => new BlueWidget
        ];
        $this->specialOffers = ['R01'];
    }

    public function addProduct(string $code) :void
    {
        if(!in_array($code, array_keys($this->widgets))) {
            throw new Exception("Product code does not match.");
        }

        $this->items[] = $this->widgets[$code];
    }


    public function totalCost() :float
    {
        $total = 0;
        $hasSpecialOffers = 0;
        foreach ($this->items as $item) {
            if(in_array($item->getCode(), $this->specialOffers)) {
                if($hasSpecialOffers == 0 || $hasSpecialOffers > 1) {
                    $total += $item->getPrice();
                } else {
                    $total += $item->getDiscountedPrice();
                }
                $hasSpecialOffers++;
            } else {
                $total += $item->getPrice();
            }
        }
        
        $delivery = new Delivery();
        $total += $delivery->getDeliveryAmount($total);

        return round($total, 2, PHP_ROUND_HALF_DOWN);
    }

    public function getItems() :array 
    {
        return $this->items;
    }
}