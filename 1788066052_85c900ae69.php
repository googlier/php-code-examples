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
    private $items = [];

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
    public function applyDiscount($amount) {
        return $amount * 0.9; // 10% discount
    }
}

class ShoppingCartDecorator {
    protected $cart;
    protected $strategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $strategy) {
        $this->cart = $cart;
        $this->strategy = $strategy;
    }

    public function addItem(Product $product) {
        $this->cart->addItem($product);
    }

    public function getTotal() {
        return $this->strategy->applyDiscount($this->cart->getTotal());
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product("Book", 20));
$cart->addItem(new Product("Pen", 5));

$discountStrategy = new DiscountStrategy();
$discountCart = new ShoppingCartDecorator($cart, $discountStrategy);

echo "Total with discount: $" . $discountCart->getTotal();
?>
```