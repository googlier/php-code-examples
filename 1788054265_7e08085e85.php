```php
<?php

// Problem: Implement a shopping cart system that allows adding and removing items.
// The shopping cart should also provide a method to calculate the total price of all items.

// Design Pattern: Observer Pattern

class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}

class ShoppingCart {
    private $items = [];
    private $observers = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
        $this->notifyObservers();
    }

    public function removeItem(Item $item) {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
            $this->notifyObservers();
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function detach($observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class TotalPriceDisplay {
    public function update(ShoppingCart $cart) {
        echo "Total Price: $" . $cart->getTotalPrice() . "\n";
    }
}

$cart = new ShoppingCart();
$totalPriceDisplay = new TotalPriceDisplay();
$cart->attach($totalPriceDisplay);

$item1 = new Item("Apple", 1.99);
$item2 = new Item("Banana", 0.99);

$cart->addItem($item1);
$cart->addItem($item2);
?>
```