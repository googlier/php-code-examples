```php
<?php

// Problem: Implement a function to calculate the total price of items in a shopping cart, applying a discount if the total exceeds $100.
// Design Pattern: Strategy

// Interface for discount strategies
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Concrete strategy for no discount
class NoDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price;
    }
}

// Concrete strategy for 10% discount
class TenPercentDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

// Concrete strategy for 20% discount
class TwentyPercentDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.8;
    }
}

// ShoppingCart class using Strategy pattern
class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem($price) {
        $this->items[] = $price;
    }

    public function calculateTotal() {
        $total = array_sum($this->items);
        return $this->discountStrategy->applyDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new NoDiscountStrategy());
$cart->addItem(100);
$cart->addItem(50);
echo "Total without discount: $" . $cart->calculateTotal() . "\n";

$cart = new ShoppingCart(new TenPercentDiscountStrategy());
$cart->addItem(100);
$cart->addItem(50);
echo "Total with 10% discount: $" . $cart->calculateTotal() . "\n";

$cart = new ShoppingCart(new TwentyPercentDiscountStrategy());
$cart->addItem(100);
$cart->addItem(50);
echo "Total with 20% discount: $" . $cart->calculateTotal() . "\n";

?>
```