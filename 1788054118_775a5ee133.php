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

class ShoppingCart {
    protected $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getTotal() {
        return array_reduce($this->products, function($carry, $product) {
            return $carry + $product->getPrice();
        }, 0);
    }
}

class Strategy {
    abstract public function calculateTotal(ShoppingCart $cart);
}

class NormalStrategy extends Strategy {
    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal();
    }
}

class DiscountStrategy extends Strategy {
    protected $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }

    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal() * (1 - $this->discount);
    }
}

class Context {
    protected $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateTotal(ShoppingCart $cart) {
        return $this->strategy->calculateTotal($cart);
    }
}

$product1 = new Product('Laptop', 1000);
$product2 = new Product('Mouse', 20);

$cart = new ShoppingCart();
$cart->addProduct($product1);
$cart->addProduct($product2);

$strategy = new NormalStrategy();
$context = new Context($strategy);
echo "Total: $" . $context->calculateTotal($cart) . "\n";

$strategy = new DiscountStrategy(0.1);
$context->setStrategy($strategy);
echo "Total with 10% discount: $" . $context->calculateTotal($cart) . "\n";

?>
```