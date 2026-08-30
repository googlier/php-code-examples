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

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class Decorator {
    protected $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function calculateTotal() {
        return $this->cart->calculateTotal();
    }
}

class TaxDecorator extends Decorator {
    public function calculateTotal() {
        $total = parent::calculateTotal();
        return $total * 1.08; // Assuming 8% tax
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product("Laptop", 999));
$cart->addItem(new Product("Mouse", 25));

$taxCart = new TaxDecorator($cart);
echo "Total with tax: $" . number_format($taxCart->calculateTotal(), 2);
?>
```