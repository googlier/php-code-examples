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
    protected $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.95; // 5% discount
    }
}

class ShoppingCartDecorator {
    protected $cart;
    protected $discountStrategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $discountStrategy) {
        $this->cart = $cart;
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem(Product $product) {
        $this->cart->addItem($product);
    }

    public function getTotal() {
        $total = $this->cart->getTotal();
        return $this->discountStrategy->applyDiscount($total);
    }
}

$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 50);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$discountStrategy = new DiscountStrategy();
$discountedCart = new ShoppingCartDecorator($cart, $discountStrategy);

echo "Total: $" . $discountedCart->getTotal();
?>
```