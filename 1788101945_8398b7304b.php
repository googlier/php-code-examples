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

class ShoppingCartDecorator {
    protected $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function addItem(Product $product) {
        $this->cart->addItem($product);
    }

    public function getTotal() {
        return $this->cart->getTotal();
    }
}

class TaxDecorator extends ShoppingCartDecorator {
    protected $taxRate;

    public function __construct(ShoppingCart $cart, $taxRate) {
        parent::__construct($cart);
        $this->taxRate = $taxRate;
    }

    public function getTotal() {
        $total = parent::getTotal();
        return $total + ($total * $this->taxRate);
    }
}

// Usage
$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 25);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$taxCart = new TaxDecorator($cart, 0.1);
echo "Total with tax: " . $taxCart->getTotal();
?>
```