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
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

class Logger {
    public static function log($message) {
        error_log($message);
    }
}

class LoggerDecorator {
    private $logger;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function log($message) {
        $this->logger->log($message);
    }
}

class ShoppingCartDecorator extends LoggerDecorator {
    private $cart;

    public function __construct(Logger $logger, ShoppingCart $cart) {
        parent::__construct($logger);
        $this->cart = $cart;
    }

    public function addProduct(Product $product) {
        $this->cart->addProduct($product);
        $this->log("Product added: " . $product->getName());
    }

    public function getTotal() {
        $total = $this->cart->getTotal();
        $this->log("Total: " . $total);
        return $total;
    }
}

$logger = new Logger();
$cart = new ShoppingCartDecorator($logger, new ShoppingCart());
$product1 = new Product("Apple", 1.50);
$product2 = new Product("Banana", 0.75);
$cart->addProduct($product1);
$cart->addProduct($product2);
echo "Total: $" . $cart->getTotal();

?>
```