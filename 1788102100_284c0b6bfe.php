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

interface ShoppingCart {
    public function addItem(Product $product);
    public function getTotal();
}

class SimpleShoppingCart implements ShoppingCart {
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

$cart = new SimpleShoppingCart();
$cart->addItem(new Product("Book", 20));
$cart->addItem(new Product("Pen", 5));
echo "Total: $" . $cart->getTotal();

?>
```