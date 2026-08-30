```php
<?php
// Random Problem: Implement a function to calculate the total cost of items in a shopping cart, applying a discount if the total exceeds a certain amount

// Random Design Pattern: Strategy

interface DiscountStrategy {
    public function calculateDiscount($total);
}

class NoDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return 0;
    }
}

class TenPercentDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return $total * 0.10;
    }
}

class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem($item, $price) {
        $this->items[$item] = $price;
    }

    public function getTotal() {
        $total = array_sum($this->items);
        $discount = $this->discountStrategy->calculateDiscount($total);
        return $total - $discount;
    }
}

// Usage
$cart = new ShoppingCart(new TenPercentDiscountStrategy());
$cart->addItem('Apple', 1.20);
$cart->addItem('Banana', 0.50);
$cart->addItem('Cherry', 2.00);
echo "Total Cost: $" . number_format($cart->getTotal(), 2);
?>
```