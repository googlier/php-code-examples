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

class DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.9; // 10% discount
    }
}

class ShoppingCartDecorator {
    protected $cart;
    protected $strategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $strategy) {
        $this->cart = $cart;
        $this->strategy = $strategy;
    }

    public function getTotal() {
        return $this->strategy->applyDiscount($this->cart->getTotal());
    }
}

// Usage
$product1 = new Product("Laptop", 999);
$product2 = new Product("Mouse", 25);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$strategy = new DiscountStrategy();
$decoratedCart = new ShoppingCartDecorator($cart, $strategy);

echo "Total with discount: $" . $decoratedCart->getTotal();
?>
```