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
    protected $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

class DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.9; // 10% discount
    }
}

class ShoppingCartDecorator {
    protected $shoppingCart;
    protected $discountStrategy;

    public function __construct(ShoppingCart $shoppingCart, DiscountStrategy $discountStrategy) {
        $this->shoppingCart = $shoppingCart;
        $this->discountStrategy = $discountStrategy;
    }

    public function addProduct(Product $product) {
        $this->shoppingCart->addProduct($product);
    }

    public function getTotal() {
        $total = $this->shoppingCart->getTotal();
        return $this->discountStrategy->applyDiscount($total);
    }
}

$products = [
    new Product('Laptop', 1000),
    new Product('Mouse', 50),
    new Product('Keyboard', 100)
];

$shoppingCart = new ShoppingCart();
$discountStrategy = new DiscountStrategy();
$decoratedCart = new ShoppingCartDecorator($shoppingCart, $discountStrategy);

foreach ($products as $product) {
    $decoratedCart->addProduct($product);
}

echo 'Total: ' . $decoratedCart->getTotal();
?>
```