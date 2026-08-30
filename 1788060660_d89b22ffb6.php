```php
<?php

// Problem: Implement a simple shopping cart system that allows adding items, removing items, and calculating the total price.

// Design Pattern: Observer Pattern

class CartItem {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class ShoppingCart {
    private $items = [];
    private $observers = [];

    public function addItem(CartItem $item) {
        $this->items[] = $item;
        $this->notifyObservers();
    }

    public function removeItem(CartItem $item) {
        $key = array_search($item, $this->items);
        if ($key !== false) {
            unset($this->items[$key]);
            $this->notifyObservers();
        }
    }

    public function getTotalPrice() {
        return array_sum(array_map(function($item) {
            return $item->price;
        }, $this->items));
    }

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    private function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

interface Observer {
    public function update(ShoppingCart $cart);
}

class CartObserver implements Observer {
    public function update(ShoppingCart $cart) {
        echo "Cart updated. Total price: " . $cart->getTotalPrice() . "\n";
    }
}

$cart = new ShoppingCart();
$observer = new CartObserver();
$cart->attach($observer);

$item1 = new CartItem("Book", 10);
$item2 = new CartItem("Pen", 2);

$cart->addItem($item1);
$cart->addItem($item2);

$cart->removeItem($item1);

?>
```