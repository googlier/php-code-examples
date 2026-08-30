```php
<?php

class ShoppingCart {
    private $items = [];

    public function addItem($item, $quantity) {
        if (!isset($this->items[$item])) {
            $this->items[$item] = $quantity;
        } else {
            $this->items[$item] += $quantity;
        }
    }

    public function removeItem($item) {
        unset($this->items[$item]);
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item => $quantity) {
            $total += $item * $quantity;
        }
        return $total;
    }
}

class ShoppingCartDecorator {
    protected $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function addItem($item, $quantity) {
        $this->cart->addItem($item, $quantity);
    }

    public function removeItem($item) {
        $this->cart->removeItem($item);
    }

    public function getTotal() {
        return $this->cart->getTotal();
    }
}

class DiscountDecorator extends ShoppingCartDecorator {
    private $discount;

    public function __construct(ShoppingCart $cart, $discount) {
        parent::__construct($cart);
        $this->discount = $discount;
    }

    public function getTotal() {
        return parent::getTotal() * (1 - $this->discount);
    }
}

$cart = new ShoppingCart();
$cart->addItem(10, 2);
$cart->addItem(5, 3);

$discountCart = new DiscountDecorator($cart, 0.1);

echo "Total without discount: " . $cart->getTotal() . "\n";
echo "Total with discount: " . $discountCart->getTotal() . "\n";

?>
```