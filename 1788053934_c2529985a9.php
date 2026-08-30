```php
<?php
// Problem: Create a function to calculate the total cost of items in a shopping cart, applying a discount to the total if the total exceeds $100

// Design Pattern: Strategy Pattern

// Define the Strategy Interface
interface DiscountStrategy {
    public function applyDiscount($total);
}

// Concrete Strategy 1: No Discount
class NoDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($total) {
        return $total;
    }
}

// Concrete Strategy 2: 10% Discount
class TenPercentDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.9;
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

    public function getTotal() {
        $total = array_reduce($this->items, function($sum, $item) {
            return $sum + $item['price'];
        }, 0);

        return $this->discountStrategy->applyDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new TenPercentDiscountStrategy());
$cart->addItem('Book', 20);
$cart->addItem('Pen', 5);
$cart->addItem('Notebook', 10);
echo "Total: $" . number_format($cart->getTotal(), 2);
?>
```