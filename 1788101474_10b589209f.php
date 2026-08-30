```php
<?php

// Problem: Implement a simple shopping cart that can add items, remove items, and calculate total price.

// Design Pattern: Observer Pattern

// Product class
class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

// Observer interface
interface Observer {
    public function update(Product $product);
}

// ShoppingCart class
class ShoppingCart implements Observer {
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
        $this->notify($product);
    }

    public function removeProduct(Product $product) {
        $index = array_search($product, $this->products, true);
        if ($index !== false) {
            unset($this->products[$index]);
            $this->notify($product);
        }
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }

    private function notify(Product $product) {
        echo "Product {$product->name} has been added or removed from the cart. Total: {$this->calculateTotal()}\n";
    }
}

// Usage
$product1 = new Product("Laptop", 1200);
$product2 = new Product("Mouse", 20);

$cart = new ShoppingCart();
$cart->addProduct($product1);
$cart->addProduct($product2);
$cart->removeProduct($product1);

?>
```