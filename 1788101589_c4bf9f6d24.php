```php
<?php

// Problem: Implement a shopping cart system that can add, remove, and display items.

// Design Pattern: Observer

class ShoppingCart {
    private $observers = [];
    private $items = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
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

    public function addItem($item) {
        $this->items[] = $item;
        $this->notify();
    }

    public function removeItem($item) {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
        }
        $this->notify();
    }

    public function getItems() {
        return $this->items;
    }
}

interface Observer {
    public function update(ShoppingCart $cart);
}

class Display implements Observer {
    public function update(ShoppingCart $cart) {
        echo "Current items: " . implode(", ", $cart->getItems()) . "\n";
    }
}

$cart = new ShoppingCart();
$display = new Display();

$cart->attach($display);

$cart->addItem('Apple');
$cart->addItem('Banana');
$cart->removeItem('Apple');
?>
```