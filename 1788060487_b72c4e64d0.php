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

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class Strategy {
    public function calculate($cart) {
        throw new Exception("Strategy not implemented");
    }
}

class NormalStrategy extends Strategy {
    public function calculate($cart) {
        return $cart->calculateTotal();
    }
}

class DiscountStrategy extends Strategy {
    public function calculate($cart) {
        return $cart->calculateTotal() * 0.9;
    }
}

class Context {
    private $strategy;

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(ShoppingCart $cart) {
        return $this->strategy->calculate($cart);
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product("Laptop", 999.99));
$cart->addItem(new Product("Mouse", 29.99));

$context = new Context();
$context->setStrategy(new NormalStrategy());
echo "Total (Normal): $" . $context->executeStrategy($cart) . "\n";

$context->setStrategy(new DiscountStrategy());
echo "Total (Discount): $" . $context->executeStrategy($cart) . "\n";

?>
```