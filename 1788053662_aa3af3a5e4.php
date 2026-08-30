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

class CartDecorator {
    protected $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function getTotal() {
        return $this->cart->getTotal();
    }
}

class TaxDecorator extends CartDecorator {
    private $taxRate;

    public function __construct(ShoppingCart $cart, $taxRate) {
        parent::__construct($cart);
        $this->taxRate = $taxRate;
    }

    public function getTotal() {
        return parent::getTotal() * (1 + $this->taxRate);
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product('Book', 10.99));
$cart->addItem(new Product('Pen', 2.50));

$taxDecorator = new TaxDecorator($cart, 0.08);

echo "Total including tax: $" . number_format($taxDecorator->getTotal(), 2);
?>
```