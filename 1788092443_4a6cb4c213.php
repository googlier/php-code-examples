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

class NoDiscount implements DiscountStrategy {
    public function applyDiscount(Product $product) {
        return $product->getPrice();
    }
}

class PercentageDiscount implements DiscountStrategy {
    protected $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount(Product $product) {
        return $product->getPrice() * (1 - $this->percentage / 100);
    }
}

class ProductDiscount {
    protected $product;
    protected $discountStrategy;

    public function __construct(Product $product, DiscountStrategy $discountStrategy) {
        $this->product = $product;
        $this->discountStrategy = $discountStrategy;
    }

    public function getTotalPrice() {
        return $this->discountStrategy->applyDiscount($this->product);
    }
}

$product = new Product("Laptop", 1000);
$discountStrategy = new PercentageDiscount(10);
$productDiscount = new ProductDiscount($product, $discountStrategy);

echo "Total Price: " . $productDiscount->getTotalPrice();
?>
```