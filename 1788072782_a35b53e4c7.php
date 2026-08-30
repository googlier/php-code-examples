```php
<?php

// Random Programming Problem: Implement a shopping cart system that can add items, remove items, and calculate the total price.

// Design Pattern: Strategy

interface ShoppingCartStrategy {
    public function calculateTotal($items);
}

class NormalPriceStrategy implements ShoppingCartStrategy {
    public function calculateTotal($items) {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}

class DiscountStrategy implements ShoppingCartStrategy {
    public function calculateTotal($items) {
        $total = 0;
        foreach ($items as $item) {
            if ($item['quantity'] > 5) {
                $total += ($item['price'] * $item['quantity']) * 0.95;
            } else {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}

class ShoppingCart {
    private $items;
    private $strategy;

    public function __construct($strategy) {
        $this->items = [];
        $this->strategy = $strategy;
    }

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function removeItem($index) {
        array_splice($this->items, $index, 1);
    }

    public function getTotal() {
        return $this->strategy->calculateTotal($this->items);
    }
}

// Usage
$normalStrategy = new NormalPriceStrategy();
$discountStrategy = new DiscountStrategy();

$cart1 = new ShoppingCart($normalStrategy);
$cart1->addItem(['name' => 'Book', 'price' => 20, 'quantity' => 3]);
$cart1->addItem(['name' => 'Pen', 'price' => 10, 'quantity' => 2]);
echo "Total: $" . $cart1->getTotal() . "\n";

$cart2 = new ShoppingCart($discountStrategy);
$cart2->addItem(['name' => 'Notebook', 'price' => 5, 'quantity' => 6]);
$cart2->addItem(['name' => 'Pencil', 'price' => 2, 'quantity' => 10]);
echo "Total: $" . $cart2->getTotal() . "\n";

?>
```