```php
<?php

// Define a function to generate a random integer between min and max
function randomInt($min, $max) {
    return mt_rand($min, $max);
}

// Define a function to generate a random string of given length
function randomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[randomInt(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Define an interface for a Product
interface Product {
    public function getName();
    public function getPrice();
}

// Define a class for ConcreteProductA
class ConcreteProductA implements Product {
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

// Define a class for ConcreteProductB
class ConcreteProductB implements Product {
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

// Define a class for a ProductFactory using Factory Method pattern
class ProductFactory {
    public static function createProduct($type) {
        switch ($type) {
            case 'A':
                return new ConcreteProductA(randomString(5), randomInt(10, 100));
            case 'B':
                return new ConcreteProductB(randomString(5), randomInt(10, 100));
            default:
                throw new Exception('Invalid product type');
        }
    }
}

// Usage
try {
    $productA = ProductFactory::createProduct('A');
    $productB = ProductFactory::createProduct('B');

    echo "Product A: " . $productA->getName() . " - Price: $" . $productA->getPrice() . "\n";
    echo "Product B: " . $productB->getName() . " - Price: $" . $productB->getPrice() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
```