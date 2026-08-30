```php
<?php

// Problem: Implement a shopping cart system that can add items, remove items, and calculate the total cost. Use the Observer design pattern to notify when the total cost changes.

// Observer Interface
interface Observer {
    public function update($totalCost);
}

// Concrete Observer
class Display implements Observer {
    public function update($totalCost) {
        echo "Total Cost: $" . $totalCost . "\n";
    }
}

// Subject Interface
interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

// Concrete Subject
class ShoppingCart implements Subject {
    private $observers = [];
    private $items = [];
    private $totalCost = 0;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->totalCost);
        }
    }

    public function addItem($item, $price) {
        $this->items[$item] = $price;
        $this->totalCost += $price;
        $this->notify();
    }

    public function removeItem($item) {
        if (isset($this->items[$item])) {
            $this->totalCost -= $this->items[$item];
            unset($this->items[$item]);
            $this->notify();
        }
    }
}

// Usage
$cart = new ShoppingCart();
$display = new Display();

$cart->attach($display);

$cart->addItem("Book", 15);
$cart->addItem("Pen", 2);
$cart->removeItem("Pen");

?>
```