```php
<?php
// Problem: Implement a simple shopping cart system that allows adding items, removing items, and calculating the total price. Use the Strategy design pattern to implement different discount strategies.

// Strategy Interface
interface DiscountStrategy {
    public function applyDiscount($price);
}

// Concrete Strategy: No Discount
class NoDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price;
    }
}

// Concrete Strategy: 10% Discount
class TenPercentDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

// Concrete Strategy: 20% Discount
class TwentyPercentDiscount implements DiscountStrategy {
    public function applyDiscount($price) {
        return $price * 0.8;
    }
}

// Context
class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function removeItem($item) {
        $this->items = array_filter($this->items, function($i) use ($item) {
            return $i['item'] !== $item;
        });
    }

    public function calculateTotal() {
        $total = array_sum(array_map(function($item) {
            return $item['price'];
        }, $this->items));
        return $this->discountStrategy->applyDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new TenPercentDiscount());
$cart->addItem("Book", 10);
$cart->addItem("Pen", 2);
echo "Total: $" . $cart->calculateTotal(); // Output: Total: $9

$cart->removeItem("Pen");
echo "Total after removing Pen: $" . $cart->calculateTotal(); // Output: Total after removing Pen: $9

$cart->addItem("Notebook", 5);
echo "Total after adding Notebook: $" . $cart->calculateTotal(); // Output: Total after adding Notebook: $10.8
?>
```