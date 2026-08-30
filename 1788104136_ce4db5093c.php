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
    public function calculate($price) {
        return $price;
    }
}

class DiscountStrategy implements Strategy {
    public function calculate($price) {
        return $price * 0.9; // 10% discount
    }
}

class ShoppingCartWithStrategy {
    private $items = [];
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $this->strategy->calculate($total);
    }
}

$product1 = new Product("Book", 15);
$product2 = new Product("Pen", 2);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

echo "Total without discount: " . $cart->calculateTotal() . "\n";

$discountCart = new ShoppingCartWithStrategy(new DiscountStrategy());
$discountCart->addItem($product1);
$discountCart->addItem($product2);

echo "Total with discount: " . $discountCart->calculateTotal() . "\n";
?>
```