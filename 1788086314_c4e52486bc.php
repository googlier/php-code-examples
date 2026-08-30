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

class StrategyInterface {
    public function calculateTotal(ShoppingCart $cart) {
        // Implementation will be provided by concrete strategies
    }
}

class RegularStrategy implements StrategyInterface {
    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal();
    }
}

class DiscountStrategy implements StrategyInterface {
    public function calculateTotal(ShoppingCart $cart) {
        $total = $cart->getTotal();
        return $total * 0.9; // 10% discount
    }
}

class Context {
    private $strategy;

    public function __construct(StrategyInterface $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(StrategyInterface $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy(ShoppingCart $cart) {
        return $this->strategy->calculateTotal($cart);
    }
}

// Usage
$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 20);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$context = new Context(new RegularStrategy());
echo "Regular Total: " . $context->executeStrategy($cart) . "\n";

$context->setStrategy(new DiscountStrategy());
echo "Discount Total: " . $context->executeStrategy($cart) . "\n";
?>
```