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
        return $total;
    }
}

class SummerDiscountStrategy extends DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.9;
    }
}

class ShoppingCartDecorator {
    private $cart;
    private $strategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $strategy) {
        $this->cart = $cart;
        $this->strategy = $strategy;
    }

    public function addItem(Product $product) {
        $this->cart->addItem($product);
    }

    public function getTotal() {
        return $this->strategy->applyDiscount($this->cart->getTotal());
    }
}

$product1 = new Product("Book", 20);
$product2 = new Product("Pen", 5);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$summerDiscount = new SummerDiscountStrategy();
$decoratedCart = new ShoppingCartDecorator($cart, $summerDiscount);

echo "Total after discount: " . $decoratedCart->getTotal();

?>
```