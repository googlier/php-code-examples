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
        return array_sum(array_map(function(Product $product) {
            return $product->getPrice();
        }, $this->products));
    }
}

class DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.95;
    }
}

class ShoppingCartContext {
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function setDiscountStrategy(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function checkout(ShoppingCart $cart) {
        $total = $cart->getTotal();
        return $this->discountStrategy->applyDiscount($total);
    }
}

$cart = new ShoppingCart();
$cart->addProduct(new Product("Laptop", 1000));
$cart->addProduct(new Product("Mouse", 20));

$strategy = new DiscountStrategy();
$context = new ShoppingCartContext($strategy);

echo "Total with discount: " . $context->checkout($cart);
?>
```