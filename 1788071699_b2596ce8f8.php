```php
<?php
// Problem: Implement a shopping cart system that can dynamically add or remove items and calculate the total price

// Design Pattern: Strategy Pattern

interface CartStrategy {
    public function calculatePrice($items);
}

class NormalPriceStrategy implements CartStrategy {
    public function calculatePrice($items) {
        return array_sum($items);
    }
}

class DiscountPriceStrategy implements CartStrategy {
    public function calculatePrice($items) {
        $discount = array_sum($items) * 0.1;
        return array_sum($items) - $discount;
    }
}

class ShoppingCart {
    private $items = [];
    private $strategy;

    public function __construct(CartStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function removeItem($item) {
        $key = array_search($item, $this->items);
        if ($key !== false) {
            unset($this->items[$key]);
        }
    }

    public function getTotalPrice() {
        return $this->strategy->calculatePrice($this->items);
    }
}

// Usage
$cart = new ShoppingCart(new NormalPriceStrategy());
$cart->addItem(100);
$cart->addItem(200);
echo "Total Price: " . $cart->getTotalPrice() . "\n";

$cart = new ShoppingCart(new DiscountPriceStrategy());
$cart->addItem(100);
$cart->addItem(200);
echo "Total Price with Discount: " . $cart->getTotalPrice() . "\n";
?>
```