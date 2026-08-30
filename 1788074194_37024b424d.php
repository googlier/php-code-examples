```php
<?php

// Problem: Implement a simple shopping cart that can add items, remove items, and calculate the total price.
// Design Pattern: Strategy

class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

interface CartStrategy {
    public function calculateTotal($items);
}

class DefaultCartStrategy implements CartStrategy {
    public function calculateTotal($items) {
        return array_sum(array_map(function($item) {
            return $item->price;
        }, $items));
    }
}

class Cart {
    private $items = [];
    private $strategy;

    public function __construct(CartStrategy $strategy = null) {
        $this->strategy = $strategy ?? new DefaultCartStrategy();
    }

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function removeItem(Item $item) {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
        }
    }

    public function getTotal() {
        return $this->strategy->calculateTotal($this->items);
    }
}

// Example usage
$item1 = new Item('Apple', 1.5);
$item2 = new Item('Banana', 0.75);

$cart = new Cart();
$cart->addItem($item1);
$cart->addItem($item2);

echo "Total: $" . $cart->getTotal();
?>
```