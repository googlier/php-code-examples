```php
<?php

// Random Programming Problem: Implement a shopping cart with discounts

// Define an interface for items
interface Item {
    public function getPrice();
}

// Define a class for a concrete item
class Product implements Item {
    private $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

// Define a class for a discount strategy
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Define a class for a percentage discount strategy
class PercentageDiscount implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price * (1 - $this->percentage / 100);
    }
}

// Define a class for a shopping cart
class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function setDiscountStrategy(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }

        if ($this->discountStrategy) {
            return $this->discountStrategy->applyDiscount($total);
        }

        return $total;
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem(new Product(100));
$cart->addItem(new Product(50));
$cart->setDiscountStrategy(new PercentageDiscount(10));
echo "Total: " . $cart->calculateTotal();

?>
```