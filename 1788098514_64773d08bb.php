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
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

class Strategy {
    public function calculate($total) {
        return $total;
    }
}

class DiscountStrategy extends Strategy {
    public function calculate($total) {
        return $total * 0.9;
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

    public function checkout(ShoppingCart $cart) {
        $total = $cart->getTotal();
        return $this->strategy->calculate($total);
    }
}

$cart = new ShoppingCart();
$cart->addProduct(new Product("Laptop", 1000));
$cart->addProduct(new Product("Mouse", 20));

$context = new ShoppingCartContext(new Strategy());
$total = $context->checkout($cart);
echo "Total: $" . $total . "\n";

$context->setStrategy(new DiscountStrategy());
$total = $context->checkout($cart);
echo "Total with discount: $" . $total . "\n";
?>
```