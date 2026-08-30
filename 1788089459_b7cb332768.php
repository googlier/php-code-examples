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

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getTotal() {
        return array_sum(array_map(function($item) {
            return $item->getPrice();
        }, $this->items));
    }
}

class Strategy {
    public function calculate($cart) {
        throw new Exception("Strategy not implemented");
    }
}

class NormalStrategy extends Strategy {
    public function calculate($cart) {
        return $cart->getTotal();
    }
}

class VIPStrategy extends Strategy {
    public function calculate($cart) {
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

    public function calculateTotal($cart) {
        return $this->strategy->calculate($cart);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem(new Product("Book", 20));
$cart->addItem(new Product("Pen", 5));

$normalStrategy = new NormalStrategy();
$vipStrategy = new VIPStrategy();

$context = new ShoppingCartContext($normalStrategy);
echo "Normal Price: $" . $context->calculateTotal($cart) . "\n";

$context->setStrategy($vipStrategy);
echo "VIP Price: $" . $context->calculateTotal($cart) . "\n";
?>
```