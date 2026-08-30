```php
<?php

class Order {
    private $items = [];

    public function addItem($item, $quantity) {
        $this->items[$item] = $quantity;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item => $quantity) {
            $total += $item * $quantity;
        }
        return $total;
    }
}

class OrderProcessor {
    public function processOrder(Order $order) {
        $total = $order->getTotal();
        if ($total > 100) {
            $total *= 0.9; // Apply a 10% discount for orders over $100
        }
        return $total;
    }
}

$order = new Order();
$order->addItem(10, 2); // Add 2 items at $10 each
$order->addItem(20, 1); // Add 1 item at $20 each

$processor = new OrderProcessor();
$finalTotal = $processor->processOrder($order);

echo "Final Total: $" . $finalTotal;

?>
```