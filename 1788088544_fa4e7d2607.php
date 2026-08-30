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
    private $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotal() {
        return array_reduce($this->items, function($carry, $item) {
            return $carry + $item->getPrice();
        }, 0);
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product("Laptop", 999));
$cart->addItem(new Product("Mouse", 25));

echo "Total: $" . $cart->getTotal();

?>
```