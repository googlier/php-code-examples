```php
<?php
// Problem: Implement a simple shopping cart system that can add items and calculate the total price.

// Design Pattern: Strategy

interface ShoppingCartStrategy {
    public function calculateTotal($items);
}

class ShoppingCart {
    private $strategy;

    public function __construct(ShoppingCartStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItems($items) {
        // Simulate adding items to the cart
        return count($items);
    }

    public function getTotalPrice($items) {
        return $this->strategy->calculateTotal($items);
    }
}

class NormalPriceStrategy implements ShoppingCartStrategy {
    public function calculateTotal($items) {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}

class BulkPriceStrategy implements ShoppingCartStrategy {
    public function calculateTotal($items) {
        $total = 0;
        foreach ($items as $item) {
            if ($item['quantity'] >= 5) {
                $total += $item['price'] * $item['quantity'] * 0.9; // 10% discount
            } else {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}

// Usage
$items = [
    ['name' => 'Product A', 'price' => 10, 'quantity' => 2],
    ['name' => 'Product B', 'price' => 20, 'quantity' => 3],
    ['name' => 'Product C', 'price' => 15, 'quantity' => 4]
];

$normalStrategy = new NormalPriceStrategy();
$bulkStrategy = new BulkPriceStrategy();

$cart1 = new ShoppingCart($normalStrategy);
$cart2 = new ShoppingCart($bulkStrategy);

echo "Normal Price Strategy Total: " . $cart1->getTotalPrice($items) . "\n";
echo "Bulk Price Strategy Total: " . $cart2->getTotalPrice($items) . "\n";
?>
```