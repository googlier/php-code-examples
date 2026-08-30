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
    protected $products;

    public function __construct() {
        $this->products = [];
    }

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

class Decorator {
    protected $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function getTotal() {
        return $this->cart->getTotal();
    }
}

class TaxDecorator extends Decorator {
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

$cart = new ShoppingCart();
$cart->addProduct(new Product("Book", 20));
$cart->addProduct(new Product("Pen", 5));

$taxDecorator = new TaxDecorator($cart, 0.05);

echo "Total Price with Tax: $" . number_format($taxDecorator->getTotal(), 2);

?>
```