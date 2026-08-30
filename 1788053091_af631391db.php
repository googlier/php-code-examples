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

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

class ShoppingCartWithDiscount {
    private $cart;
    private $discountStrategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $discountStrategy) {
        $this->cart = $cart;
        $this->discountStrategy = $discountStrategy;
    }

    public function getTotalPrice() {
        return $this->discountStrategy->applyDiscount($this->cart->getTotalPrice());
    }
}

$product1 = new Product("Book", 20);
$product2 = new Product("Pen", 5);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$discountStrategy = new DiscountStrategy();
$cartWithDiscount = new ShoppingCartWithDiscount($cart, $discountStrategy);

echo "Total Price: $" . $cartWithDiscount->getTotalPrice();
?>
```