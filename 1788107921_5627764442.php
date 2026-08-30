```php
<?php
class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function display() {
        echo "Product: " . $this->name . ", Price: $" . $this->price . "<br>";
    }
}

class Cart {
    private $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }
}

class ShoppingCartFactory {
    public static function createCart() {
        return new Cart();
    }
}

// Usage
$cart = ShoppingCartFactory::createCart();
$cart->addItem(new Product("Laptop", 999));
$cart->addItem(new Product("Mouse", 25));
echo "Total: $" . $cart->getTotal();
?>
```