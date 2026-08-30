```php
<?php
// Problem: Create a function to calculate the total price of items in a shopping cart
// Design Pattern: Strategy

// Define the strategy interface
interface PricingStrategy {
    public function calculatePrice($price, $quantity);
}

// Define concrete strategy for regular pricing
class RegularPricingStrategy implements PricingStrategy {
    public function calculatePrice($price, $quantity) {
        return $price * $quantity;
    }
}

// Define concrete strategy for bulk pricing
class BulkPricingStrategy implements PricingStrategy {
    public function calculatePrice($price, $quantity) {
        return $price * $quantity * 0.9; // 10% discount for bulk
    }
}

// Define context
class ShoppingCart {
    private $strategy;
    private $items = [];

    public function setStrategy(PricingStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem($price, $quantity) {
        $this->items[] = ['price' => $price, 'quantity' => $quantity];
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $this->strategy->calculatePrice($item['price'], $item['quantity']);
        }
        return $total;
    }
}

// Usage
$cart = new ShoppingCart();
$cart->setStrategy(new RegularPricingStrategy());
$cart->addItem(10, 2);
$cart->addItem(5, 5);
echo "Total: " . $cart->getTotal();

$cart->setStrategy(new BulkPricingStrategy());
$cart->addItem(20, 3);
echo "Total with bulk discount: " . $cart->getTotal();
?>
```