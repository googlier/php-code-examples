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
    public function getTotal() {
        $total = parent::getTotal();
        $tax = $total * 0.1; // 10% tax
        return $total + $tax;
    }
}

class PromotionDecorator extends ShoppingCartDecorator {
    public function getTotal() {
        $total = parent::getTotal();
        $discount = $total * 0.05; // 5% discount
        return $total - $discount;
    }
}

$cart = new ShoppingCart();
$cart->addItem(new Product("Laptop", 1000));
$cart->addItem(new Product("Mouse", 50));

$taxedCart = new TaxDecorator($cart);
$discountedCart = new PromotionDecorator($taxedCart);

echo "Total: $" . $discountedCart->getTotal();

?>
```