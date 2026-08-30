```php
<?php

class ShoppingCart {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getTotal() {
        return array_sum($this->items);
    }
}

class TaxDecorator {
    private $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function addItem($item) {
        $this->cart->addItem($item);
    }

    public function getTotal() {
        $total = $this->cart->getTotal();
        return $total + ($total * 0.1); // 10% tax
    }
}

$cart = new ShoppingCart();
$cart->addItem(10);
$cart->addItem(20);

$taxCart = new TaxDecorator($cart);

echo $taxCart->getTotal(); // Output: 33
?>
```