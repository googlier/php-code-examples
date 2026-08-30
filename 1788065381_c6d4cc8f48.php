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

interface ShoppingCartStrategy {
    public function calculateTotal(array $products): float;
}

class NormalStrategy implements ShoppingCartStrategy {
    public function calculateTotal(array $products): float {
        $total = 0;
        foreach ($products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

class DiscountStrategy implements ShoppingCartStrategy {
    public function calculateTotal(array $products): float {
        $total = 0;
        foreach ($products as $product) {
            $total += $product->getPrice() * 0.9;
        }
        return $total;
    }
}

class ShoppingCart {
    private $strategy;
    private $products = [];

    public function __construct(ShoppingCartStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function calculateTotal(): float {
        return $this->strategy->calculateTotal($this->products);
    }
}

$normalStrategy = new NormalStrategy();
$discountStrategy = new DiscountStrategy();

$cart1 = new ShoppingCart($normalStrategy);
$cart1->addProduct(new Product("Apple", 1.5));
$cart1->addProduct(new Product("Banana", 0.5));
echo "Total with normal strategy: $" . $cart1->calculateTotal() . "\n";

$cart2 = new ShoppingCart($discountStrategy);
$cart2->addProduct(new Product("Apple", 1.5));
$cart2->addProduct(new Product("Banana", 0.5));
echo "Total with discount strategy: $" . $cart2->calculateTotal() . "\n";
?>
```