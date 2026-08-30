```php
<?php
// Problem: Implement a shopping cart system that can dynamically add or remove items and calculate the total cost.

// Design Pattern: Strategy

interface CartStrategy {
    public function calculateTotal(array $items): float;
}

class BasicCartStrategy implements CartStrategy {
    public function calculateTotal(array $items): float {
        return array_sum($items);
    }
}

class DiscountCartStrategy implements CartStrategy {
    public function calculateTotal(array $items): float {
        $discount = array_sum($items) * 0.10; // 10% discount
        return array_sum($items) - $discount;
    }
}

class ShoppingCart {
    private $items;
    private $strategy;

    public function __construct(CartStrategy $strategy) {
        $this->items = [];
        $this->strategy = $strategy;
    }

    public function addItem(int $itemPrice): void {
        $this->items[] = $itemPrice;
    }

    public function removeItem(int $itemPrice): void {
        $this->items = array_filter($this->items, function($item) use ($itemPrice) {
            return $item !== $itemPrice;
        });
    }

    public function getTotal(): float {
        return $this->strategy->calculateTotal($this->items);
    }
}

// Usage
$cart = new ShoppingCart(new BasicCartStrategy());
$cart->addItem(100);
$cart->addItem(200);
echo "Total: $" . $cart->getTotal() . "<br>";

$cart->setStrategy(new DiscountCartStrategy());
echo "Total with discount: $" . $cart->getTotal();
?>
```