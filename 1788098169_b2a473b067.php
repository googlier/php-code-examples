```php
<?php
// Problem: Implement a simple shopping cart system that supports adding items, removing items, and calculating the total price. Use the Strategy pattern to handle different discount strategies.

// Define the Strategy interface
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Implement a concrete strategy for no discount
class NoDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price;
    }
}

// Implement a concrete strategy for a 10% discount
class TenPercentDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

// Implement a concrete strategy for a 20% discount
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

    public function addItem($item, $price) {
        $this->items[$item] = $price;
    }

    public function removeItem($item) {
        unset($this->items[$item]);
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $price) {
            $total += $price;
        }
        return $this->discountStrategy->applyDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new TenPercentDiscountStrategy());
$cart->addItem('Apple', 1.0);
$cart->addItem('Banana', 0.5);
$cart->addItem('Cherry', 2.0);

echo "Total with 10% discount: $" . number_format($cart->getTotal(), 2);
?>
```