```php
<?php

// Problem: Implement a function to calculate the total cost of items in a shopping cart, applying a discount based on the total amount.

// Design Pattern: Strategy

// Strategy Interface
interface DiscountStrategy {
    public function calculateDiscount($total);
}

// Concrete Strategy: No Discount
class NoDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return 0;
    }
}

// Concrete Strategy: 10% Discount
class TenPercentDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return $total * 0.10;
    }
}

// Context
class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'];
        }
        return $total - $this->discountStrategy->calculateDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new TenPercentDiscountStrategy());
$cart->addItem('Book', 20);
$cart->addItem('Pen', 5);
echo $cart->calculateTotal(); // Outputs: 17.5

?>
```