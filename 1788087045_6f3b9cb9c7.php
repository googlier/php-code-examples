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
    public function calculateDiscount($amount) {
        return $amount * 0.9; // 10% discount
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
        $originalTotal = $this->cart->getTotal();
        return $this->strategy->calculateDiscount($originalTotal);
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product('Laptop', 1000));
$cart->addItem(new Product('Mouse', 20));

$strategy = new DiscountStrategy();
$decoratedCart = new ShoppingCartDecorator($cart, $strategy);

echo "Total after discount: $" . $decoratedCart->getTotal();

?>
```