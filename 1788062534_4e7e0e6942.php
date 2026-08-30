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

class NoDiscountStrategy implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price;
    }
}

class PercentageDiscountStrategy implements DiscountStrategy {
    protected $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price - ($price * $this->percentage / 100);
    }
}

class Context {
    private $strategy;

    public function __construct(DiscountStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(DiscountStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(Product $product) {
        return $this->strategy->applyDiscount($product->getPrice());
    }
}

$product = new Product("Laptop", 1000);
$context = new Context(new NoDiscountStrategy());
echo $context->executeStrategy($product) . "\n";

$context->setStrategy(new PercentageDiscountStrategy(20));
echo $context->executeStrategy($product) . "\n";
?>
```