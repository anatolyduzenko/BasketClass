<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Basket;
use App\Delivery;
use App\Widgets\BlueWidget;
use App\Widgets\GreenWidget;
use App\Widgets\RedWidget;

$basket = new Basket(new RedWidget, new GreenWidget, new BlueWidget, new Delivery);
$basket->addProduct('B01');
$basket->addProduct('G01');

echo "Test case B01, G01\n";
echo $basket->totalCost();
echo "\n";

$basket = new Basket(new RedWidget, new GreenWidget, new BlueWidget, new Delivery);
$basket->addProduct('R01');
$basket->addProduct('R01');

echo "Test case R01, R01\n";
echo $basket->totalCost();
echo "\n";

$basket = new Basket(new RedWidget, new GreenWidget, new BlueWidget, new Delivery);
$basket->addProduct('R01');
$basket->addProduct('G01');

echo "Test case R01, G01\n";
echo $basket->totalCost();
echo "\n";

$basket = new Basket(new RedWidget, new GreenWidget, new BlueWidget, new Delivery);
$basket->addProduct('B01');
$basket->addProduct('B01');
$basket->addProduct('R01');
$basket->addProduct('R01');
$basket->addProduct('R01');

echo "Test case 2x B01, 3x R01\n";
echo $basket->totalCost();
echo "\n";