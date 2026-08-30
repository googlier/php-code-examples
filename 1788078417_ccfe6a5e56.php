```php
<?php

// Problem: Implement a simple shopping cart system that allows users to add items, remove items, and calculate the total price.

// Design Pattern: Strategy Pattern

interface ShoppingCartStrategy {
    public function calculateTotal($items);
}

class ShoppingCartContext {
    private $strategy;

    public function __construct(ShoppingCartStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(ShoppingCartStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateTotal($items) {
        return $this->strategy->calculateTotal($items);
    }
}

class FlatRateShippingStrategy implements ShoppingCartStrategy {
    public function calculateTotal($items) {
        return array_sum($items) + 10;
    }
}

class PercentageDiscountStrategy implements ShoppingCartStrategy {
    public function calculateTotal($items) {
        $discount = array_sum($items) * 0.10;
        return array_sum($items) - $discount;
    }
}

// Usage
$items = [10, 20, 30];

$context = new ShoppingCartContext(new FlatRateShippingStrategy());
echo "Total with flat rate shipping: $" . $context->calculateTotal($items) . "<br>";

$context->setStrategy(new PercentageDiscountStrategy());
echo "Total with 10% discount: $" . $context->calculateTotal($items) . "<br>";
?>
```