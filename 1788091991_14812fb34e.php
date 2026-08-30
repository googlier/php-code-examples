```php
<?php

class ShoppingCart {
    private $items = [];

    public function addItem($item, $quantity) {
        $this->items[$item] = $quantity;
    }

    public function getItems() {
        return $this->items;
    }
}

class Observer {
    abstract public function update($message);
}

class EmailNotification implements Observer {
    public function update($message) {
        echo "Email Notification: " . $message . "\n";
    }
}

class SMSNotification implements Observer {
    public function update($message) {
        echo "SMS Notification: " . $message . "\n";
    }
}

class Order {
    private $shoppingCart;
    private $observers = [];

    public function __construct(ShoppingCart $shoppingCart) {
        $this->shoppingCart = $shoppingCart;
    }

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function placeOrder() {
        $items = $this->shoppingCart->getItems();
        $message = "Order placed with items: ";
        foreach ($items as $item => $quantity) {
            $message .= $item . " x " . $quantity . ", ";
        }
        $message = rtrim($message, ", ");

        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}

$shoppingCart = new ShoppingCart();
$shoppingCart->addItem("Laptop", 1);
$shoppingCart->addItem("Mouse", 2);

$emailNotification = new EmailNotification();
$smsNotification = new SMSNotification();

$order = new Order($shoppingCart);
$order->addObserver($emailNotification);
$order->addObserver($smsNotification);

$order->placeOrder();

?>
```