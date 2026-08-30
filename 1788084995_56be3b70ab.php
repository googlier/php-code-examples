```php
<?php

class ShoppingCart {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function removeItem($item) {
        $this->items = array_diff($this->items, [$item]);
        $this->items = array_values($this->items);
    }

    public function getItems() {
        return $this->items;
    }
}

class StrategyInterface {
    public function calculateTotal($cart);
}

class RegularStrategy implements StrategyInterface {
    public function calculateTotal($cart) {
        $total = 0;
        foreach ($cart->getItems() as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}

class BulkStrategy implements StrategyInterface {
    public function calculateTotal($cart) {
        $total = 0;
        foreach ($cart->getItems() as $item) {
            if ($item['quantity'] > 10) {
                $total += $item['price'] * $item['quantity'] * 0.9; // 10% discount
            } else {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}

class Context {
    private $strategy;

    public function setStrategy(StrategyInterface $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateTotal($cart) {
        return $this->strategy->calculateTotal($cart);
    }
}

$cart = new ShoppingCart();
$cart->addItem(['name' => 'Product A', 'price' => 10, 'quantity' => 5]);
$cart->addItem(['name' => 'Product B', 'price' => 20, 'quantity' => 15]);

$context = new Context();
$context->setStrategy(new RegularStrategy());
echo "Total (Regular Strategy): " . $context->calculateTotal($cart) . "\n";

$context->setStrategy(new BulkStrategy());
echo "Total (Bulk Strategy): " . $context->calculateTotal($cart) . "\n";

?>
```