```php
<?php
// Problem: Implement a system to manage a simple inventory of products using the Observer design pattern.

// Class representing the Product
class Product {
    private $name;
    private $stock;

    public function __construct($name, $stock) {
        $this->name = $name;
        $this->stock = $stock;
        $this->observers = [];
    }

    public function getName() {
        return $this->name;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
        $this->notifyObservers();
    }

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

// Class representing an Observer
interface Observer {
    public function update($product);
}

// Class representing a Notification System
class NotificationSystem implements Observer {
    public function update($product) {
        if ($product->getStock() < 10) {
            echo "Alert: Low stock for " . $product->getName() . ". Only " . $product->getStock() . " units left!\n";
        }
    }
}

// Usage
$product = new Product("Laptop", 15);
$notificationSystem = new NotificationSystem();
$product->addObserver($notificationSystem);

$product->setStock(5); // This should trigger the notification
?>
```