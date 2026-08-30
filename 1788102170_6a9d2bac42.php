```php
<?php
class Product {
    private $price;
    private $quantity;

    public function __construct($price, $quantity) {
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getTotalPrice() {
        return $this->price * $this->quantity;
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
            $total += $item->getTotalPrice();
        }
        return $total;
    }
}

class ShoppingCartDecorator {
    protected $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function getTotal() {
        return $this->cart->getTotal();
    }
}

class TaxDecorator extends ShoppingCartDecorator {
    private $taxRate;

    public function __construct(ShoppingCart $cart, $taxRate) {
        parent::__construct($cart);
        $this->taxRate = $taxRate;
    }

    public function getTotal() {
        return parent::getTotal() + parent::getTotal() * $this->taxRate;
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product(10, 2));
$cart->addItem(new Product(5, 3));

$taxedCart = new TaxDecorator($cart, 0.1);
echo $taxedCart->getTotal();
?>
```