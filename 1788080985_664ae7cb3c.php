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

    public function apply($total) {
        return $total - ($total * $this->discount);
    }
}

class ShoppingCartDecorator {
    protected $cart;
    protected $decorator;

    public function __construct(ShoppingCart $cart, Coupon $decorator) {
        $this->cart = $cart;
        $this->decorator = $decorator;
    }

    public function addItem(Product $product) {
        $this->cart->addItem($product);
    }

    public function getTotal() {
        return $this->decorator->apply($this->cart->getTotal());
    }
}

$product1 = new Product("Laptop", 999);
$product2 = new Product("Mouse", 25);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$coupon = new Coupon(0.10);

$decoratedCart = new ShoppingCartDecorator($cart, $coupon);

echo "Total: $" . $decoratedCart->getTotal();
?>
```