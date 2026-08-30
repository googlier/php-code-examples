```php
<?php
// Define a Product interface
interface Product {
    public function getName();
    public function getPrice();
}

// Implement a ConcreteProduct class
class ConcreteProduct implements Product {
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

// Define a Factory interface
interface Factory {
    public function createProduct();
}

// Implement a ConcreteFactory class
class ConcreteFactory implements Factory {
    public function createProduct() {
        return new ConcreteProduct("Laptop", 999.99);
    }
}

// Implement a Singleton class
class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function useProduct(Factory $factory) {
        $product = $factory->createProduct();
        echo "Product Name: " . $product->getName() . "<br>";
        echo "Product Price: $" . $product->getPrice() . "<br>";
    }
}

// Usage
$factory = new ConcreteFactory();
$singleton = Singleton::getInstance();
$singleton->useProduct($factory);
?>
```