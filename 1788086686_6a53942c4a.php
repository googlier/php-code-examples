```php
<?php
// Problem: Implement a simple shopping cart system that can add items, remove items, and calculate the total price.

// Design Pattern: Strategy

interface ShoppingCartStrategy {
    public function addItem($item, $price);
    public function removeItem($item);
    public function calculateTotal();
}

class ShoppingCart {
    private $items = [];
    private $strategy;

    public function __construct(ShoppingCartStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem($item, $price) {
        $this->strategy->addItem($item, $price);
    }

    public function removeItem($item) {
        $this->strategy->removeItem($item);
    }

    public function calculateTotal() {
        return $this->strategy->calculateTotal();
    }
}

class FixedPriceStrategy implements ShoppingCartStrategy {
    public $total = 0;

    public function addItem($item, $price) {
        $this->total += $price;
    }

    public function removeItem($item) {
        // Implementation depends on how items are stored
    }

    public function calculateTotal() {
        return $this->total;
    }
}

class DiscountStrategy implements ShoppingCartStrategy {
    public $total = 0;
    public $discount = 0.1; // 10% discount

    public function addItem($item, $price) {
        $this->total += $price;
    }

    public function removeItem($item) {
        // Implementation depends on how items are stored
    }

    public function calculateTotal() {
        return $this->total * (1 - $this->discount);
    }
}

// Usage
$cart = new ShoppingCart(new FixedPriceStrategy());
$cart->addItem("Book", 15);
$cart->addItem("Pen", 2);
echo "Total: " . $cart->calculateTotal(); // Output: Total: 17

$cart = new ShoppingCart(new DiscountStrategy());
$cart->addItem("Notebook", 5);
$cart->addItem("Pencil", 1);
echo "Total: " . $cart->calculateTotal(); // Output: Total: 4.5
?>
```