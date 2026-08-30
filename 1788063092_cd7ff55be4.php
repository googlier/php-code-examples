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
        return $price * (1 - $this->percentage / 100);
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

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function setDiscountStrategy(DiscountStrategy $strategy) {
        $this->discountStrategy = $strategy;
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        if ($this->discountStrategy) {
            $total = $this->discountStrategy->applyDiscount($total);
        }
        return $total;
    }
}

$cart = new ShoppingCart();
$cart->addProduct(new Product('Book', 20));
$cart->addProduct(new Product('Pen', 5));

$cart->setDiscountStrategy(new PercentageDiscount(10));
echo "Total with 10% discount: " . $cart->calculateTotal() . "\n";

$cart->setDiscountStrategy(new FixedDiscount(2));
echo "Total with $2 fixed discount: " . $cart->calculateTotal() . "\n";

?>
```