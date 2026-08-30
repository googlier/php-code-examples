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

interface Observer {
    public function update($product);
}

class PriceDisplay implements Observer {
    public function update($product) {
        echo "Price of {$product->getName()} is now {$product->getPrice()}\n";
    }
}

class ProductManager {
    private $observers = [];

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer) {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
                break;
            }
        }
    }

    public function notifyObservers($product) {
        foreach ($this->observers as $observer) {
            $observer->update($product);
        }
    }
}

$product = new Product("Laptop", 1200);
$display = new PriceDisplay();
$productManager = new ProductManager();

$productManager->addObserver($display);

$product->price = 1300;
$productManager->notifyObservers($product);

?>
```