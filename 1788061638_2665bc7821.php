```php
<?php
class Product {
    protected $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

class DiscountStrategy {
    public function applyDiscount(Product $product) {
        return $product->getPrice();
    }
}

class PercentageDiscountStrategy extends DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount(Product $product) {
        return $product->getPrice() - ($product->getPrice() * ($this->percentage / 100));
    }
}

class Cart {
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

$cart = new Cart(new PercentageDiscountStrategy(10));
$cart->addProduct(new Product(100));
$cart->addProduct(new Product(200));
echo $cart->getTotal();
?>
```