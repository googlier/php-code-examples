```php
<?php
// Problem: Implement a function that calculates the total price of items in a shopping cart after applying a discount based on the total amount.

// Design Pattern: Strategy Pattern

// Define the Strategy Interface
interface DiscountStrategy {
    public function calculateDiscount($total);
}

// Implement Concrete Strategies
class NoDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return 0;
    }
}

class FlatDiscountStrategy implements DiscountStrategy {
    private $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }

    public function calculateDiscount($total) {
        return $this->discount;
    }
}

class PercentageDiscountStrategy implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function calculateDiscount($total) {
        return ($total * $this->percentage) / 100;
    }
}

// Context Class
class ShoppingCart {
    private $items;
    private $discountStrategy;

    public function __construct($discountStrategy) {
        $this->items = [];
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function calculateTotal() {
        $total = array_sum(array_column($this->items, 'price'));
        return $total - $this->discountStrategy->calculateDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new FlatDiscountStrategy(10));
$cart->addItem('Book', 20);
$cart->addItem('Pen', 5);
echo 'Total Price: ' . $cart->calculateTotal();
?>
```