```php
<?php

class Product {
    protected $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

interface DiscountStrategy {
    public function calculateDiscount($price);
}

class TenPercentDiscount implements DiscountStrategy {
    public function calculateDiscount($price) {
        return $price * 0.10;
    }
}

class NoDiscount implements DiscountStrategy {
    public function calculateDiscount($price) {
        return 0;
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

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        $discount = $this->discountStrategy->calculateDiscount($total);
        return $total - $discount;
    }
}

$cart = new ShoppingCart(new TenPercentDiscount());
$cart->addProduct(new Product(100));
$cart->addProduct(new Product(200));
echo $cart->getTotal();

?>
```