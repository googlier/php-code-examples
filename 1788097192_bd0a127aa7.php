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

    public function getItems() {
        return $this->items;
    }
}

class DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.9;
    }
}

class TaxStrategy {
    public function addTax($total) {
        return $total * 1.1;
    }
}

class StrategyContext {
    private $strategy;

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($total) {
        return $this->strategy->applyDiscount($total);
    }
}

$cart = new ShoppingCart();
$cart->addItem('apple', 2);
$cart->addItem('banana', 3);

$total = array_sum($cart->getItems());
$context = new StrategyContext();
$context->setStrategy(new TaxStrategy());
$total = $context->executeStrategy($total);

echo "Total: " . $total . "\n";

?>
```