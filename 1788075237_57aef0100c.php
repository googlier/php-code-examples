```php
<?php

class ShoppingCart {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function removeItem($item) {
        $key = array_search($item, $this->items);
        if ($key !== false) {
            unset($this->items[$key]);
        }
    }

    public function getItems() {
        return $this->items;
    }
}

class Observer {
    public function update($message) {
        echo $message . "\n";
    }
}

class Subject {
    private $observers = [];

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notifyObservers($message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}

class ShoppingCartObserver implements Observer {
    private $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function update($message) {
        echo "Cart Update: " . $message . "\n";
    }
}

$cart = new ShoppingCart();
$observer = new ShoppingCartObserver($cart);
$cart->addObserver($observer);

$cart->addItem("Apple");
$cart->addItem("Banana");
$cart->removeItem("Apple");
$cart->addItem("Cherry");

?>
```