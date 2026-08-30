```php
<?php
// Problem: Implement a shopping cart system with support for adding items, removing items, and calculating total price.

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

class FixedDiscountStrategy implements ShoppingCartStrategy {
    private $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }

    public function addItem($item, $price) {
        $this->items[] = $price;
    }

    public function removeItem($item) {
        unset($this->items[$item]);
    }

    public function calculateTotal() {
        return array_sum($this->items) - ($array_sum($this->items) * ($this->discount / 100));
    }
}

class PercentageDiscountStrategy implements ShoppingCartStrategy {
    private $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }

    public function addItem($item, $price) {
        $this->items[] = $price;
    }

    public function removeItem($item) {
        unset($this->items[$item]);
    }

    public function calculateTotal() {
        return array_sum($this->items) - ($array_sum($this->items) * ($this->discount / 100));
    }
}

// Usage
$cart = new ShoppingCart(new FixedDiscountStrategy(10));
$cart->addItem("Item 1", 100);
$cart->addItem("Item 2", 200);
echo "Total with 10% fixed discount: " . $cart->calculateTotal() . "\n";

$cart = new ShoppingCart(new PercentageDiscountStrategy(10));
echo "Total with 10% percentage discount: " . $cart->calculateTotal() . "\n";
?>
```