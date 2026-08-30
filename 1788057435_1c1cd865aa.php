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

interface DiscountStrategy {
    public function calculateDiscount($price);
}

class PercentageDiscountStrategy implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function calculateDiscount($price) {
        return $price * ($this->percentage / 100);
    }
}

class FixedDiscountStrategy implements DiscountStrategy {
    private $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function calculateDiscount($price) {
        return $this->amount;
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

    public function calculateTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        $discount = $this->discountStrategy->calculateDiscount($total);
        return $total - $discount;
    }
}

$products = [
    new Product("Laptop", 999),
    new Product("Mouse", 20),
    new Product("Keyboard", 50)
];

$discountStrategy = new PercentageDiscountStrategy(10);
$cart = new ShoppingCart($discountStrategy);

foreach ($products as $product) {
    $cart->addProduct($product);
}

echo "Total: $" . $cart->calculateTotal();
?>
```