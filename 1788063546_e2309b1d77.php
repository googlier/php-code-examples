```php
<?php

// Define a random programming problem and solve it using a random design pattern

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

class FixedDiscount implements DiscountStrategy {
    private $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function applyDiscount($price) {
        return $price - $this->amount;
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

    public function getTotalPrice() {
        $totalPrice = array_sum(array_map(function($product) {
            return $product->getPrice();
        }, $this->products));

        return $this->discountStrategy->applyDiscount($totalPrice);
    }
}

// Usage
$cart = new ShoppingCart(new PercentageDiscount(10));
$cart->addProduct(new Product('Laptop', 1000));
$cart->addProduct(new Product('Mouse', 20));

echo $cart->getTotalPrice(); // Output: 880

?>
```