```php
<?php

class Product {
    protected $name;
    protected $price;

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
    protected $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price * (1 - $this->percentage / 100);
    }
}

class FixedDiscount implements DiscountStrategy {
    protected $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function applyDiscount($price) {
        return $price - $this->amount;
    }
}

class ShoppingCart {
    protected $products = [];
    protected $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $this->discountStrategy->applyDiscount($total);
    }
}

$products = [
    new Product("Laptop", 1200),
    new Product("Mouse", 50),
    new Product("Keyboard", 100)
];

$discountStrategy = new PercentageDiscount(10);
$cart = new ShoppingCart($discountStrategy);

foreach ($products as $product) {
    $cart->addProduct($product);
}

echo "Total after discount: " . $cart->getTotal();

?>
```