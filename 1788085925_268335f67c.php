```php
<?php

// Problem: Implement a simple shopping cart that can add items and calculate the total price.

// Design Pattern: Observer Pattern

// Interface for observers
interface Observer {
    public function update($price);
}

// Concrete observer that displays the total price
class Display implements Observer {
    private $totalPrice = 0;

    public function update($price) {
        $this->totalPrice += $price;
        echo "Current Total Price: $" . $this->totalPrice . "<br>";
    }
}

// Subject class
class ShoppingCart {
    private $observers = [];
    private $items = [];

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function addItem($price) {
        $this->items[] = $price;
        $this->notifyObservers($price);
    }

    private function notifyObservers($price) {
        foreach ($this->observers as $observer) {
            $observer->update($price);
        }
    }
}

// Usage
$cart = new ShoppingCart();
$display = new Display();

$cart->addObserver($display);

$cart->addItem(10.99);
$cart->addItem(20.50);
$cart->addItem(5.75);

?>
```