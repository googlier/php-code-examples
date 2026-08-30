```php
<?php

// Define a class for a Product
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

// Define a class for a ShoppingCart
class ShoppingCart {
    private $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

// Create instances of Product and ShoppingCart
$product1 = new Product("Laptop", 999.99);
$product2 = new Product("Mouse", 25.50);
$cart = new ShoppingCart();

// Add products to the cart
$cart->addItem($product1);
$cart->addItem($product2);

// Calculate and display the total
echo "Total: $" . $cart->getTotal();

?>
```