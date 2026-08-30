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

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product('Apple', 0.50));
$cart->addItem(new Product('Banana', 0.30));
$cart->addItem(new Product('Cherry', 0.20));

echo 'Total: $' . $cart->calculateTotal();

?>
```