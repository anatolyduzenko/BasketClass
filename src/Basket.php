<?php

namespace App;

use App\Contracts\BasketInterface;
use App\Contracts\WidgetInterface;
use App\Contracts\DeliveryInterface;
use Exception;

class Basket implements BasketInterface
{
    private $items = [];
    protected $widgets = [];
    private $specialOffers = [];
    protected $delivery;

    public function __construct(DeliveryInterface $delivery, array $widgets) {
        foreach ($widgets as $widget) {
            if ($widget instanceof WidgetInterface) {
                $this->widgets[$widget->getCode()] = $widget;
            }
        }
        $this->delivery = $delivery;
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
        
        $total += $this->delivery->getDeliveryAmount($total);

        return round($total, 2, PHP_ROUND_HALF_DOWN);
    }

    public function getProducts(): array
    {
        return $this->items;
    }
}