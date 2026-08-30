```php
<?php

class Product {
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

class Logger {
    public function log($message) {
        echo $message . "\n";
    }
}

class Order {
    private $shoppingCart;
    private $logger;

    public function __construct(ShoppingCart $shoppingCart, Logger $logger) {
        $this->shoppingCart = $shoppingCart;
        $this->logger = $logger;
    }

    public function placeOrder() {
        $totalPrice = $this->shoppingCart->getTotalPrice();
        $this->logger->log("Order placed with total price: $" . $totalPrice);
    }
}

$shoppingCart = new ShoppingCart();
$logger = new Logger();
$order = new Order($shoppingCart, $logger);

$product1 = new Product("Laptop", 999);
$product2 = new Product("Mouse", 19.99);
$shoppingCart->addItem($product1);
$shoppingCart->addItem($product2);

$order->placeOrder();

?>
```