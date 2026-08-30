```php
<?php

class Product {
    private $name;
    private $price;

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

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class Observer {
    public function update($message) {
        echo "Notification: " . $message . "\n";
    }
}

class Subject {
    private $observers = [];
    private $state;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify($message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }

    public function setState($state) {
        $this->state = $state;
        $this->notify("State changed to: " . $state);
    }

    public function getState() {
        return $this->state;
    }
}

class CartObserver implements Observer {
    private $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function update($message) {
        echo "Cart Update: " . $message . "\n";
        echo "Current Total Price: " . $this->cart->getTotalPrice() . "\n";
    }
}

$cart = new ShoppingCart();
$observer = new CartObserver($cart);
$subject = new Subject();

$subject->attach($observer);

$product1 = new Product("Laptop", 999);
$product2 = new Product("Mouse", 25);

$cart->addItem($product1);
$cart->addItem($product2);

$subject->setState("Cart Updated");
?>
```