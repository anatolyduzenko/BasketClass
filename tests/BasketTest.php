<?php

use PHPUnit\Framework\TestCase;
use App\Basket;
use App\Services\Delivery;
use App\Widgets\RedWidget;
use App\Widgets\GreenWidget;
use App\Widgets\BlueWidget;

class BasketTest extends TestCase
{
    private $basket;

    protected function setUp(): void
    {
        $redWidget = new RedWidget();
        $greenWidget = new GreenWidget();
        $blueWidget = new BlueWidget();
        $delivery = new Delivery();

        $this->basket = new Basket($delivery, [$redWidget, $greenWidget, $blueWidget]);
    }

    public function testAddProductWithValidCode()
    {
        $this->basket->addProduct('R01');
        $this->assertCount(1, $this->basket->getProducts());
    }

    public function testAddProductWithInvalidCode()
    {
        $this->expectException(Exception::class);
        $this->basket->addProduct('X01'); 
    }

    public function testTotalCostWithoutSpecialOffers()
    {
        $this->basket->addProduct('G01'); 
        $this->basket->addProduct('B01'); 

        $expectedTotal = 24.95 + 7.95; 
        $expectedTotal += 4.95;  // Delivery value

        $this->assertEquals(round($expectedTotal, 2), $this->basket->totalCost());
    }

    public function testTotalCostWithSpecialOffers()
    {
        $this->basket->addProduct('R01'); 
        $this->basket->addProduct('R01'); 

        $expectedTotal = 32.95 + 16.47; 
        $expectedTotal += 4.95;  // Delivery value

        $this->assertEquals(round($expectedTotal, 2), $this->basket->totalCost());
    }

    public function testTotalCostWithMultipleSpecialOffers()
    {
        $this->basket->addProduct('B01'); 
        $this->basket->addProduct('B01'); 
        $this->basket->addProduct('R01'); 
        $this->basket->addProduct('R01'); 
        $this->basket->addProduct('R01'); 

        $expectedTotal = 7.95 + 7.95 + 32.95 + 16.47 + 32.95; 
        $expectedTotal += 0; // No delivery

        $this->assertEquals(round($expectedTotal, 2), $this->basket->totalCost());
    }

    public function testGetProducts()
    {
        $this->basket->addProduct('R01');
        $this->basket->addProduct('G01');

        $items = $this->basket->getProducts();
        $this->assertCount(2, $items);
        $this->assertInstanceOf(RedWidget::class, $items[0]);
        $this->assertInstanceOf(GreenWidget::class, $items[1]);
    }
}
