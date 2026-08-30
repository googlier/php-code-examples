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

interface DiscountStrategy {
    public function applyDiscount(Product $product);
}

class PercentageDiscountStrategy implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount(Product $product) {
        return $product->getPrice() * (1 - $this->percentage / 100);
    }
}

class FixedDiscountStrategy implements DiscountStrategy {
    private $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function applyDiscount(Product $product) {
        return $product->getPrice() - $this->amount;
    }
}

class ShoppingCart {
    private $products = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $this->discountStrategy->applyDiscount($product);
        }
        return $total;
    }
}

$products = [
    new Product("Laptop", 1000),
    new Product("Smartphone", 500),
    new Product("Tablet", 300)
];

$percentageDiscount = new PercentageDiscountStrategy(10);
$fixedDiscount = new FixedDiscountStrategy(100);

$cart1 = new ShoppingCart($percentageDiscount);
$cart1->addProduct($products[0]);
$cart1->addProduct($products[1]);
echo "Cart 1 Total: $" . $cart1->getTotal() . "\n";

$cart2 = new ShoppingCart($fixedDiscount);
$cart2->addProduct($products[2]);
echo "Cart 2 Total: $" . $cart2->getTotal() . "\n";
?>
```