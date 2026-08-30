```php
<?php
// Problem: Implement a system that calculates the total cost of items in a shopping cart, applying a discount if the total exceeds $100.

// Design Pattern: Strategy

interface DiscountStrategy {
    public function calculateDiscount($total);
}

class NoDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return $total;
    }
}

class FlatDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return $total - 10;
    }
}

class PercentageDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return $total - ($total * 0.10);
    }
}

class ShoppingCart {
    private $discountStrategy;

    public function setDiscountStrategy(DiscountStrategy $strategy) {
        $this->discountStrategy = $strategy;
    }

    public function calculateTotal($items) {
        $total = array_sum($items);
        return $this->discountStrategy->calculateDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->setDiscountStrategy(new NoDiscountStrategy());
echo "Total without discount: $" . $cart->calculateTotal([50, 60]);

$cart->setDiscountStrategy(new FlatDiscountStrategy());
echo "\nTotal with flat $10 discount: $" . $cart->calculateTotal([50, 60]);

$cart->setDiscountStrategy(new PercentageDiscountStrategy());
echo "\nTotal with 10% discount: $" . $cart->calculateTotal([50, 60]);
?>
```