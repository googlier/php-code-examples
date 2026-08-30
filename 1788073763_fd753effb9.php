```php
<?php

class ShoppingCart {
    private $items = [];

    public function addItem($item, $quantity) {
        $this->items[$item] = $quantity;
    }

    public function getItems() {
        return $this->items;
    }
}

class DiscountStrategy {
    public function calculateDiscount($total) {
        return $total * 0.1; // 10% discount
    }
}

class ShoppingCartStrategy implements Strategy {
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function execute(ShoppingCart $cart) {
        $total = array_sum($cart->getItems());
        $discount = $this->discountStrategy->calculateDiscount($total);
        return $total - $discount;
    }
}

$cart = new ShoppingCart();
$cart->addItem("Item1", 2);
$cart->addItem("Item2", 1);
$discountStrategy = new DiscountStrategy();
$strategy = new ShoppingCartStrategy($discountStrategy);
$total = $strategy->execute($cart);

echo "Total after discount: " . $total;

?>
```