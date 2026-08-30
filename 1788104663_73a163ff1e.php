```php
<?php

// Problem: Implement a simple shopping cart system with functionalities to add items, remove items, and calculate total.

// Design Pattern: Observer

class ShoppingCart {
    private $observers = [];
    private $items = [];

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function detach($observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function addItem($item, $quantity) {
        $this->items[$item] = $quantity;
        $this->notify();
    }

    public function removeItem($item) {
        if (isset($this->items[$item])) {
            unset($this->items[$item]);
            $this->notify();
        }
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item => $quantity) {
            $total += $item['price'] * $quantity;
        }
        return $total;
    }

    public function getItems() {
        return $this->items;
    }
}

interface Observer {
    public function update($cart);
}

class TotalDisplay implements Observer {
    public function update($cart) {
        echo "Total: " . $cart->calculateTotal() . "\n";
    }
}

$cart = new ShoppingCart();
$totalDisplay = new TotalDisplay();
$cart->attach($totalDisplay);

$cart->addItem(['name' => 'Laptop', 'price' => 1000], 1);
$cart->addItem(['name' => 'Mouse', 'price' => 25], 2);
$cart->removeItem('Mouse');
?>
```