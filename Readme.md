# Basket Class
The Basket class is part of a shopping cart system, allowing you to add products, apply special offers, calculate total costs, and manage items in the basket. This README provides instructions on how to set up, use, and test this class.

## Installation

1. Clone the repository:

    `git clone https://github.com/anatolyduzenko/BasketClass.git`

    `cd BasketClass`

2. Install dependencies:

    `composer install`

3. Setup Autoloading:

    `composer dump-autoload`

## Usage

### Constructor Dependencies

The Basket class requires instances of RedWidget, GreenWidget, BlueWidget, and Delivery to be injected through its constructor.

* "Widget" classes represent the products. 
* Delivery: Handles delivery cost calculations based on the basket total.

### Methods

* **addProduct(string $code)**: Adds a product to the basket based on the product code.
* **totalCost()**: Calculates the total cost of all items in the basket, including special offers and delivery charges.
* **getItems()**: Returns the list of items currently in the basket.

## Example Usage

```php
    <?php

    use App\Basket;
    use App\Widgets\RedWidget;
    use App\Widgets\GreenWidget;
    use App\Widgets\BlueWidget;
    use App\Services\Delivery;

    require 'vendor/autoload.php';

    $redWidget = new RedWidget();
    $greenWidget = new GreenWidget();
    $blueWidget = new BlueWidget();
    $delivery = new Delivery();

    $basket = new Basket($delivery, [$redWidget, $greenWidget, $blueWidget]);

    $basket->addProduct('R01');
    $basket->addProduct('G01');
    $basket->addProduct('B01');

    echo "Total cost: $" . $basket->totalCost() . "\n";

```

## Testing

### Prerequisites
Ensure you have PHPUnit installed in your project:

`composer require --dev phpunit/phpunit`
### Running Tests
Run the following command 

`vendor/bin/phpunit tests/BasketTest.php`

