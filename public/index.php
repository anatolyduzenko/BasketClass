<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Basket;

$basket = new Basket();
$basket->addProduct('B01');
$basket->addProduct('G01');

echo "Test case B01, G01\n";
echo $basket->totalCost();
echo "\n";

$basket = new Basket();
$basket->addProduct('R01');
$basket->addProduct('R01');

echo "Test case R01, R01\n";
echo $basket->totalCost();
echo "\n";

$basket = new Basket();
$basket->addProduct('R01');
$basket->addProduct('G01');

echo "Test case R01, G01\n";
echo $basket->totalCost();
echo "\n";

$basket = new Basket();
$basket->addProduct('B01');
$basket->addProduct('B01');
$basket->addProduct('R01');
$basket->addProduct('R01');
$basket->addProduct('R01');

echo "Test case 2x B01, 3x R01\n";
echo $basket->totalCost();
echo "\n";