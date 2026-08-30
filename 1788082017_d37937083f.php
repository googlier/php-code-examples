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

class Strategy {
    abstract public function calculateTotal(ShoppingCart $cart);
}

class NormalStrategy implements Strategy {
    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal();
    }
}

class DiscountStrategy implements Strategy {
    public function calculateTotal(ShoppingCart $cart) {
        return $cart->getTotal() * 0.9;
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product("Book", 15));
$cart->addItem(new Product("Pen", 5));

$strategy = new DiscountStrategy();

$total = $strategy->calculateTotal($cart);
echo "Total: " . $total;
?>
```