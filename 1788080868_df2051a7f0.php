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

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
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
    protected $taxRate = 0.1;

    public function getTotal() {
        return parent::getTotal() + parent::getTotal() * $this->taxRate;
    }
}

$cart = new ShoppingCart();
$cart->addProduct(new Product("Laptop", 1200));
$cart->addProduct(new Product("Mouse", 25));

$taxedCart = new TaxDecorator($cart);

echo "Total with tax: " . $taxedCart->getTotal();

?>
```