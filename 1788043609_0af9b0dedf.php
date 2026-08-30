```php
<?php

// Problem: Implement a simple shopping cart system that supports adding items, removing items, and calculating the total price.

// Design Pattern: Strategy Pattern

// Strategy interface
interface IShoppingCartStrategy {
    public function addItem($item, $quantity);
    public function removeItem($item);
    public function getTotalPrice();
}

// Concrete strategy for calculating total price
class ShoppingCartStrategy implements IShoppingCartStrategy {
    private $items = [];
    private $itemPrices = [
        'apple' => 0.5,
        'banana' => 0.3,
        'orange' => 0.4
    ];

    public function addItem($item, $quantity) {
        if (array_key_exists($item, $this->itemPrices)) {
            $this->items[$item] = $quantity;
        }
    }

    public function removeItem($item) {
        if (array_key_exists($item, $this->items)) {
            unset($this->items[$item]);
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item => $quantity) {
            $total += $this->itemPrices[$item] * $quantity;
        }
        return $total;
    }
}

// Context class
class ShoppingCartContext {
    private $strategy;

    public function setStrategy(IShoppingCartStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem($item, $quantity) {
        $this->strategy->addItem($item, $quantity);
    }

    public function removeItem($item) {
        $this->strategy->removeItem($item);
    }

    public function getTotalPrice() {
        return $this->strategy->getTotalPrice();
    }
}

// Usage
$cart = new ShoppingCartContext();
$cart->setStrategy(new ShoppingCartStrategy());

$cart->addItem('apple', 2);
$cart->addItem('banana', 3);
echo "Total Price: $" . $cart->getTotalPrice() . "\n";

$cart->removeItem('banana');
echo "Total Price after removal: $" . $cart->getTotalPrice() . "\n";

?>
```