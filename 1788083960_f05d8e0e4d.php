```php
<?php

// Define a class to represent a product
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

// Define an interface for a discount strategy
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Define a concrete strategy for a percentage discount
class PercentageDiscount implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price - ($price * ($this->percentage / 100));
    }
}

// Define a concrete strategy for a fixed amount discount
class FixedDiscount implements DiscountStrategy {
    private $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function applyDiscount($price) {
        return $price - $this->amount;
    }
}

// Define a context class that uses a discount strategy
class ShoppingCart {
    private $products = [];
    private $discountStrategy;

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function setDiscountStrategy(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function getTotal() {
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

// Usage
$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 20);

$cart = new ShoppingCart();
$cart->addProduct($product1);
$cart->addProduct($product2);

$cart->setDiscountStrategy(new PercentageDiscount(10));
echo "Total with 10% discount: $" . $cart->getTotal();

$cart->setDiscountStrategy(new FixedDiscount(50));
echo "\nTotal with $50 discount: $" . $cart->getTotal();

?>
```