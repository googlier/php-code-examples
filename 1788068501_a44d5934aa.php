```php
<?php

// Problem: Implement a simple shopping cart system that can add items, remove items, and calculate the total price.

// Design Pattern: Strategy

class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function removeItem($item) {
        $this->items = array_filter($this->items, function($i) use ($item) {
            return $i['item'] != $item;
        });
    }

    public function getTotal() {
        $total = array_reduce($this->items, function($sum, $item) {
            return $sum + $item['price'];
        }, 0);

        return $this->discountStrategy->applyDiscount($total);
    }
}

interface DiscountStrategy {
    public function applyDiscount($price);
}

class NoDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price;
    }
}

class TenPercentDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

// Usage
$cart = new ShoppingCart(new TenPercentDiscount());
$cart->addItem('Book', 20);
$cart->addItem('Pen', 5);
echo $cart->getTotal(); // Output: 22.5
?>
```