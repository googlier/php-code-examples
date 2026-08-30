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

    public function calculateTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

class ProductDecorator {
    protected $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function getName() {
        return $this->product->getName();
    }

    public function getPrice() {
        return $this->product->getPrice();
    }
}

class DiscountDecorator extends ProductDecorator {
    private $discount;

    public function __construct(Product $product, $discount) {
        parent::__construct($product);
        $this->discount = $discount;
    }

    public function getPrice() {
        return $this->product->getPrice() * (1 - $this->discount);
    }
}

$cart = new ShoppingCart();
$cart->addProduct(new Product('Laptop', 999));
$cart->addProduct(new DiscountDecorator(new Product('Smartphone', 499), 0.2));

echo "Total: " . $cart->calculateTotal();

?>
```