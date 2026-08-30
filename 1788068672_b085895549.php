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

class FlatDiscountStrategy implements DiscountStrategy {
    private $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function applyDiscount($price) {
        return $price - $this->amount;
    }
}

class PercentageDiscountStrategy implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price * (1 - ($this->percentage / 100));
    }
}

class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $this->discountStrategy->applyDiscount($total);
    }
}

$products = [
    new Product('Laptop', 1000),
    new Product('Mouse', 50),
    new Product('Keyboard', 100)
];

$cart = new ShoppingCart(new PercentageDiscountStrategy(10));
foreach ($products as $product) {
    $cart->addItem($product);
}

echo 'Total: $' . number_format($cart->getTotal(), 2);

?>
```