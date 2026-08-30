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

class OrderProcessor {
    public function processOrder(ShoppingCart $cart) {
        echo "Processing order...\n";
        echo "Total: " . $cart->getTotal() . "\n";
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product("Laptop", 1200));
$cart->addItem(new Product("Mouse", 25));

$processor = new OrderProcessor();
$processor->processOrder($cart);
?>
```