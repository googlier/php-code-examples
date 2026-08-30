```php
<?php
// Problem: Implement a simple shopping cart with discount strategy using the Strategy pattern.

// Define the Strategy interface
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Implement the concrete strategies
class NoDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price;
    }
}

class SummerDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

class BlackFridayDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.5;
    }
}

// Context class
class ShoppingCart {
    private $discountStrategy;

    public function setDiscountStrategy(DiscountStrategy $strategy) {
        $this->discountStrategy = $strategy;
    }

    public function calculateTotal($price) {
        return $this->discountStrategy->applyDiscount($price);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->setDiscountStrategy(new SummerDiscountStrategy());
echo $cart->calculateTotal(100); // Output: 90
?>
```