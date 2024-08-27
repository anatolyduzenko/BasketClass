<?php

namespace App;

use App\Widgets\BlueWidget;
use App\Widgets\GreenWidget;
use App\Widgets\RedWidget;
use Exception;

class Basket
{
    private $items = [];
    protected $widgets = [];
    private $specialOffers = [];
    protected $delivery;

    public function __construct(RedWidget $red, GreenWidget $green, BlueWidget $blue, Delivery $delivery) {
        $this->widgets = [
            $red->getCode() => $red,
            $green->getCode() => $green,
            $blue->getCode() => $blue
        ];
        $this->delivery = $delivery;
        $this->specialOffers = [$red->getCode()];
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
        
        $total += $this->delivery->getDeliveryAmount($total);

        return round($total, 2, PHP_ROUND_HALF_DOWN);
    }

    public function getItems() :array 
    {
        return $this->items;
    }
}