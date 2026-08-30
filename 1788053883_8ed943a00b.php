```php
<?php

// Random Design Pattern: Strategy
// Problem: Implement a discount calculation system that can apply different discount strategies.

// Define the strategy interface
interface DiscountStrategy {
    public function calculateDiscount($price);
}

// Concrete strategy for a 10% discount
class TenPercentDiscount implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price * 0.90;
    }
}

// Concrete strategy for a 20% discount
class TwentyPercentDiscount implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price * 0.80;
    }
}

// Context class that uses a discount strategy
class ShoppingCart {
    private $discountStrategy;

    public function setDiscountStrategy(DiscountStrategy $strategy) {
        $this->discountStrategy = $strategy;
    }

    public function calculateTotal($price) {
        return $this->discountStrategy->calculateDiscount($price);
    }
}

// Example usage
$cart = new ShoppingCart();
$cart->setDiscountStrategy(new TwentyPercentDiscount());
echo "Total with 20% discount: $" . $cart->calculateTotal(100);

?>
```