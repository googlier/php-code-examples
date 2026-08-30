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

class Coupon {
    protected $discount;

    public function __construct($discount) {
        $this->discount = $discount;
    }

    public function applyDiscount($total) {
        return $total - ($total * $this->discount);
    }
}

class ShoppingCartDecorator {
    protected $cart;
    protected $coupon;

    public function __construct(ShoppingCart $cart, Coupon $coupon) {
        $this->cart = $cart;
        $this->coupon = $coupon;
    }

    public function addItem(Product $product) {
        $this->cart->addItem($product);
    }

    public function getTotal() {
        $total = $this->cart->getTotal();
        return $this->coupon->applyDiscount($total);
    }
}

$product1 = new Product('Laptop', 1200);
$product2 = new Product('Mouse', 50);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$coupon = new Coupon(0.1);

$decoratedCart = new ShoppingCartDecorator($cart, $coupon);

echo 'Total after coupon: ' . $decoratedCart->getTotal();
?>
```