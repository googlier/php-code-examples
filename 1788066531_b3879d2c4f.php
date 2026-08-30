```php
<?php

// Problem: Create a function to calculate the total price of items in a shopping cart, applying a discount based on the number of items.

// Design Pattern: Strategy

interface DiscountStrategy {
    public function applyDiscount($price);
}

class NoDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price;
    }
}

class BulkDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.8; // 20% discount
    }
}

class ShoppingCart {
    private $items;
    private $discountStrategy;

    public function __construct($discountStrategy = null) {
        $this->items = [];
        $this->discountStrategy = $discountStrategy ?? new NoDiscountStrategy();
    }

    public function addItem($itemPrice) {
        $this->items[] = $itemPrice;
    }

    public function calculateTotal() {
        $total = array_sum($this->items);
        return $this->discountStrategy->applyDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new BulkDiscountStrategy());
$cart->addItem(100);
$cart->addItem(200);
$cart->addItem(300);

echo "Total price: " . $cart->calculateTotal();
?>
```