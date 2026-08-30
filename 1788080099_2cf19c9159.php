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

interface Strategy {
    public function calculateDiscount($product);
}

class PercentageDiscount implements Strategy {
    protected $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function calculateDiscount($product) {
        return $product->getPrice() * ($this->percentage / 100);
    }
}

class FixedDiscount implements Strategy {
    protected $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function calculateDiscount($product) {
        return $product->getPrice() - $this->amount;
    }
}

class ShoppingCart {
    protected $strategy;
    protected $products = [];

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function checkout() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $this->strategy->calculateDiscount($total);
    }
}

$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 50);

$cart = new ShoppingCart();
$cart->addProduct($product1);
$cart->addProduct($product2);

$cart->setStrategy(new PercentageDiscount(10));
echo "Total after discount: " . $cart->checkout() . "\n";

$cart->setStrategy(new FixedDiscount(50));
echo "Total after discount: " . $cart->checkout() . "\n";
?>
```