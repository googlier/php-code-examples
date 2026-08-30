```php
<?php
// Problem: Implement a function to calculate the total price of items in a shopping cart, applying a discount if the total exceeds a certain amount.

// Design Pattern: Strategy

interface DiscountStrategy {
    public function calculateDiscount($total);
}

class NoDiscountStrategy implements DiscountStrategy {
    public function calculateDiscount($total) {
        return $total;
    }
}

class FixedDiscountStrategy implements DiscountStrategy {
    private $discountAmount;

    public function __construct($discountAmount) {
        $this->discountAmount = $discountAmount;
    }

    public function calculateDiscount($total) {
        return $total - $this->discountAmount;
    }
}

class PercentageDiscountStrategy implements DiscountStrategy {
    private $discountPercentage;

    public function __construct($discountPercentage) {
        $this->discountPercentage = $discountPercentage;
    }

    public function calculateDiscount($total) {
        return $total - ($total * ($this->discountPercentage / 100));
    }
}

class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy = null) {
        $this->discountStrategy = $discountStrategy ?? new NoDiscountStrategy();
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function calculateTotal() {
        $total = array_sum(array_column($this->items, 'price'));
        return $this->discountStrategy->calculateDiscount($total);
    }

    public function setDiscountStrategy(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem('Book', 20);
$cart->addItem('Pen', 5);
$cart->addItem('Notebook', 10);

$total = $cart->calculateTotal();
echo "Total Price: $" . $total . "\n";

$cart->setDiscountStrategy(new FixedDiscountStrategy(5));
$totalWithFixedDiscount = $cart->calculateTotal();
echo "Total Price with Fixed Discount: $" . $totalWithFixedDiscount . "\n";

$cart->setDiscountStrategy(new PercentageDiscountStrategy(10));
$totalWithPercentageDiscount = $cart->calculateTotal();
echo "Total Price with Percentage Discount: $" . $totalWithPercentageDiscount . "\n";
?>
```