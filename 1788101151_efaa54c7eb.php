```php
<?php

// Problem: Implement a function that calculates the total price of items in a shopping cart, applying a discount if the total exceeds $100.

// Design Pattern: Strategy

interface DiscountStrategy {
    public function calculateDiscount($price);
}

class NoDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price;
    }
}

class TenPercentDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price * 0.9;
    }
}

class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem($itemPrice) {
        $this->items[] = $itemPrice;
    }

    public function getTotalPrice() {
        $total = array_sum($this->items);
        return $this->discountStrategy->calculateDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new NoDiscountStrategy());
$cart->addItem(100);
$cart->addItem(50);
echo "Total Price: $" . number_format($cart->getTotalPrice(), 2);

$cart = new ShoppingCart(new TenPercentDiscountStrategy());
$cart->addItem(150);
$cart->addItem(60);
echo "\nTotal Price with Discount: $" . number_format($cart->getTotalPrice(), 2);

?>
```