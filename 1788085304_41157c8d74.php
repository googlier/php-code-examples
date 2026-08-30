```php
<?php
// Define a simple class for a product
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

// Implementing Singleton design pattern for a ProductRepository
class ProductRepository {
    private static $instance;
    private $products;

    private function __construct() {
        $this->products = [
            new Product("Laptop", 1200),
            new Product("Smartphone", 800),
            new Product("Tablet", 450)
        ];
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new ProductRepository();
        }
        return self::$instance;
    }

    public function getProducts() {
        return $this->products;
    }
}

// Usage of Singleton
$repository = ProductRepository::getInstance();
$products = $repository->getProducts();

foreach ($products as $product) {
    echo "Product: " . $product->getName() . ", Price: $" . $product->getPrice() . "<br>";
}
?>
```