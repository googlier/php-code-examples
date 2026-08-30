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
    public function applyDiscount($price);
}

class PercentageDiscount implements DiscountStrategy {
    protected $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($price) {
        return $price * (1 - $this->percentage / 100);
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
        return $this->discountStrategy->applyDiscount($this->product->getPrice());
    }
}

$product = new Product('Laptop', 1200);
$discountStrategy = new PercentageDiscount(10);
$productDiscount = new ProductDiscount($product, $discountStrategy);

echo 'Original Price: $' . $product->getPrice() . '<br>';
echo 'Discounted Price: $' . $productDiscount->getTotalPrice();
?>
```