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

class Strategy {
    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal();
    }
}

class DiscountStrategy implements Strategy {
    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal() * 0.9;
    }
}

class ShoppingCartContext {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(ShoppingCart $cart) {
        return $this->strategy->calculateTotal($cart);
    }
}

$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 20);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$context = new ShoppingCartContext(new Strategy());
echo "Total: $" . $context->executeStrategy($cart) . "\n";

$context->setStrategy(new DiscountStrategy());
echo "Total with discount: $" . $context->executeStrategy($cart) . "\n";

?>
```