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
    abstract public function applyDiscount($total);
}

class PercentageDiscount implements DiscountStrategy {
    protected $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($total) {
        return $total - ($total * ($this->percentage / 100));
    }
}

class ShoppingCartWithDiscount extends ShoppingCart {
    protected $discountStrategy;

    public function setDiscountStrategy(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function getTotal() {
        $total = parent::getTotal();
        if ($this->discountStrategy) {
            $total = $this->discountStrategy->applyDiscount($total);
        }
        return $total;
    }
}

$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 20);

$cart = new ShoppingCartWithDiscount();
$cart->addItem($product1);
$cart->addItem($product2);

$discount = new PercentageDiscount(10);
$cart->setDiscountStrategy($discount);

echo "Total: " . $cart->getTotal();
?>
```