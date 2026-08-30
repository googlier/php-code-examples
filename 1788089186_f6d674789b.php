```php
<?php

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
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

class FixedDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price - 10;
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

$cart = new ShoppingCart(new PercentageDiscount());
$cart->addItem(new Product('Apple', 1.5));
$cart->addItem(new Product('Banana', 0.5));
echo 'Total: ' . $cart->getTotal();
?>
```