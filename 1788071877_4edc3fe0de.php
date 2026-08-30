```php
<?php
// Problem: Implement a simple shopping cart system with the following requirements:
// - Add items to the cart
// - Remove items from the cart
// - Get the total price of items in the cart
// - Apply a discount to the total price

// Design Pattern: Strategy

interface ShoppingCartStrategy {
    public function calculateDiscount($price);
}

class NoDiscountStrategy implements ShoppingCartStrategy {
    public function calculateDiscount($price) {
        return $price;
    }
}

class TenPercentDiscountStrategy implements ShoppingCartStrategy {
    public function calculateDiscount($price) {
        return $price * 0.9;
    }
}

class ShoppingCart {
    private $items = [];
    private $strategy;

    public function __construct(ShoppingCartStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function removeItem($item) {
        $this->items = array_filter($this->items, function($i) use ($item) {
            return $i['item'] != $item;
        });
    }

    public function getTotalPrice() {
        $total = array_sum(array_column($this->items, 'price'));
        return $this->strategy->calculateDiscount($total);
    }
}

// Usage
$strategy = new NoDiscountStrategy();
$cart = new ShoppingCart($strategy);
$cart->addItem('Book', 20);
$cart->addItem('Pen', 5);
echo 'Total Price: ' . $cart->getTotalPrice(); // Output: Total Price: 25

$strategy = new TenPercentDiscountStrategy();
$cart = new ShoppingCart($strategy);
$cart->addItem('Book', 20);
$cart->addItem('Pen', 5);
echo 'Total Price: ' . $cart->getTotalPrice(); // Output: Total Price: 22.5
?>
```