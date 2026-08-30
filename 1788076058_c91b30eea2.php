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
    protected $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotal() {
        return array_sum(array_map(function($item) {
            return $item->getPrice();
        }, $this->items));
    }
}

class Strategy {
    public function calculate($amount) {
        throw new Exception("Calculate method must be implemented");
    }
}

class PercentageDiscount implements Strategy {
    protected $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }

    public function calculate($amount) {
        return $amount - ($amount * ($this->discount / 100));
    }
}

class ShoppingCartContext {
    protected $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function getTotal($amount) {
        return $this->strategy->calculate($amount);
    }
}

$product1 = new Product("Laptop", 1200);
$product2 = new Product("Mouse", 25);
$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$context = new ShoppingCartContext(new PercentageDiscount(10));
$total = $context->getTotal($cart->getTotal());

echo "Total with discount: " . $total;
?>
```