```php
<?php
// Define a class to represent a Product
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

// Implementing the Factory Design Pattern
class ProductFactory {
    public static function createProduct($type, $name, $price) {
        switch($type) {
            case 'Electronics':
                return new Product($name, $price);
            case 'Clothing':
                return new Product($name, $price);
            default:
                throw new Exception("Invalid product type");
        }
    }
}

// Usage
try {
    $products = [
        ProductFactory::createProduct('Electronics', 'Laptop', 1200),
        ProductFactory::createProduct('Clothing', 'T-Shirt', 20),
    ];

    foreach ($products as $product) {
        echo "Product: " . $product->getName() . ", Price: $" . $product->getPrice() . "<br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```