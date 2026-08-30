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

interface DiscountStrategy {
    public function applyDiscount($price);
}

class PercentageDiscount implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price - ($price * $this->percentage / 100);
    }
}

class ShoppingCart {
    private $products = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $this->discountStrategy->applyDiscount($total);
    }
}

$discount = new PercentageDiscount(10);
$cart = new ShoppingCart($discount);

$cart->addProduct(new Product("Laptop", 999.99));
$cart->addProduct(new Product("Mouse", 29.99));

echo "Total: $" . number_format($cart->calculateTotal(), 2);

?>
```