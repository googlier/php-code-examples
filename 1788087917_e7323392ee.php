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

class Strategy {
    public function calculateTotal(ShoppingCart $cart) {
        throw new Exception("Strategy not implemented");
    }
}

class NormalPriceStrategy extends Strategy {
    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal();
    }
}

class DiscountStrategy extends Strategy {
    private $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }

    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal() * (1 - $this->discount);
    }
}

class Context {
    private $strategy;

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

$cart = new ShoppingCart();
$cart->addItem(new Product("Laptop", 1000));
$cart->addItem(new Product("Mouse", 50));

$strategy = new NormalPriceStrategy();
$context = new Context($strategy);
echo "Total: $" . $context->calculateTotal($cart) . "\n";

$strategy = new DiscountStrategy(0.1);
$context->setStrategy($strategy);
echo "Total with 10% discount: $" . $context->calculateTotal($cart) . "\n";
?>
```