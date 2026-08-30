```php
<?php

// Generate a random number between 1 and 100
$randomNumber = rand(1, 100);

// Define a class to represent a Product
class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

// Create an array of products
$products = [
    new Product('Laptop', 1200),
    new Product('Smartphone', 800),
    new Product('Tablet', 400),
    new Product('Mouse', 50),
    new Product('Keyboard', 100)
];

// Define a strategy interface to calculate discounts
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Implement a percentage discount strategy
class PercentageDiscount implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price - ($price * $this->percentage / 100);
    }
}

// Implement a fixed discount strategy
class FixedDiscount implements DiscountStrategy {
    private $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function applyDiscount($price) {
        return $price - $this->amount;
    }
}

// Use the Strategy Design Pattern to apply a discount based on the random number
if ($randomNumber < 30) {
    $discountStrategy = new FixedDiscount(50);
} elseif ($randomNumber < 60) {
    $discountStrategy = new PercentageDiscount(10);
} else {
    $discountStrategy = new PercentageDiscount(20);
}

// Calculate the discounted price for each product
$discountedProducts = array_map(function($product) use ($discountStrategy) {
    return new Product($product->name, $discountStrategy->applyDiscount($product->price));
}, $products);

// Output the discounted products
foreach ($discountedProducts as $product) {
    echo "Product: " . $product->name . " - Discounted Price: " . $product->price . "\n";
}

?>
```