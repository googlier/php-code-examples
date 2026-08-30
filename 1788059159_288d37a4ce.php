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

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

$cart = new ShoppingCart();
$cart->addProduct(new Product("Laptop", 1200));
$cart->addProduct(new Product("Mouse", 20));
$cart->addProduct(new Product("Keyboard", 50));

echo "Total Price: $" . $cart->getTotalPrice();
?>
```