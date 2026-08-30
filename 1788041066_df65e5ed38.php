```php
<?php

class ShoppingCart {
    protected $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}

class DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.9; // 10% discount
    }
}

class ShoppingCartDecorator {
    protected $cart;
    protected $strategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $strategy) {
        $this->cart = $cart;
        $this->strategy = $strategy;
    }

    public function addItem($item) {
        $this->cart->addItem($item);
    }

    public function getTotal() {
        $total = $this->cart->getTotal();
        return $this->strategy->applyDiscount($total);
    }
}

$cart = new ShoppingCart();
$cart->addItem(['name' => 'Item 1', 'price' => 100, 'quantity' => 2]);
$cart->addItem(['name' => 'Item 2', 'price' => 200, 'quantity' => 1]);

$strategy = new DiscountStrategy();
$decoratedCart = new ShoppingCartDecorator($cart, $strategy);

echo "Total: $" . $decoratedCart->getTotal();

?>
```