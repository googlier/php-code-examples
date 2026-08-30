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
    private $cart;
    private $strategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $strategy) {
        $this->cart = $cart;
        $this->strategy = $strategy;
    }

    public function getTotal() {
        $total = $this->cart->getTotal();
        return $this->strategy->applyDiscount($total);
    }
}

$cart = new ShoppingCart();
$cart->addProduct(new Product("Laptop", 1000));
$cart->addProduct(new Product("Mouse", 20));

$strategy = new DiscountStrategy();
$decoratedCart = new ShoppingCartDecorator($cart, $strategy);

echo "Total with discount: " . $decoratedCart->getTotal();
?>
```