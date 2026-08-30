```php
<?php

// Problem: Implement a simple e-commerce system to calculate the total price of items in a cart after applying discounts

// Design Pattern: Strategy

// Define the strategy interface
interface DiscountStrategy {
    public function calculateDiscount($price);
}

// Concrete strategy for applying a fixed discount
class FixedDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price - 10;
    }
}

// Concrete strategy for applying a percentage discount
class PercentageDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price * 0.95;
    }
}

// Context class that uses a strategy
class ShoppingCart {
    private $strategy;

    public function __construct(DiscountStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem($price) {
        return $this->strategy->calculateDiscount($price);
    }
}

// Usage
$cart = new ShoppingCart(new FixedDiscountStrategy());
$total = $cart->addItem(50);
$total += $cart->addItem(30);
echo "Total after discount: $" . $total . "\n";

$cart = new ShoppingCart(new PercentageDiscountStrategy());
$total = $cart->addItem(50);
$total += $cart->addItem(30);
echo "Total after discount: $" . $total . "\n";

?>
```