```php
<?php

// Random problem: Create a function that calculates the total price of items in a shopping cart after applying a discount based on the total amount.

// Random design pattern: Strategy Pattern

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

class TwentyPercentDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.8;
    }
}

class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function setDiscountStrategy(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function calculateTotal() {
        $total = array_sum(array_map(function($item) {
            return $item['price'];
        }, $this->items));

        return $this->discountStrategy->applyDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem('Book', 20);
$cart->addItem('Pen', 5);
$cart->addItem('Notebook', 10);

// Set discount strategy based on total amount
$total = $cart->calculateTotal();
if ($total > 50) {
    $cart->setDiscountStrategy(new TwentyPercentDiscount());
} elseif ($total > 30) {
    $cart->setDiscountStrategy(new TenPercentDiscount());
} else {
    $cart->setDiscountStrategy(new NoDiscount());
}

echo 'Total Price: ' . $cart->calculateTotal();

?>
```