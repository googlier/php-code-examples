```php
<?php
$items = ['apple', 'banana', 'orange', 'grape', 'strawberry'];

// Design Pattern: Strategy
interface DiscountStrategy {
    public function applyDiscount($price);
}

class NormalDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price;
    }
}

class WinterDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.8;
    }
}

class SummerDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

class ShoppingCart {
    private $discountStrategy;

    public function setDiscountStrategy(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function checkout($item, $price) {
        $discountedPrice = $this->discountStrategy->applyDiscount($price);
        return "You bought a $item for $discountedPrice";
    }
}

// Usage
$cart = new ShoppingCart();
$cart->setDiscountStrategy(new WinterDiscount());

foreach ($items as $item) {
    echo $cart->checkout($item, 10) . "\n";
}
?>
```