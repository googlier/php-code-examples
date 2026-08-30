```php
<?php
// Problem: Implement a simple shopping cart system with the ability to add items and calculate the total price.
// Design Pattern: Strategy

class ShoppingCart {
    private $items = [];
    private $strategy;

    public function __construct(PriceStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $this->strategy->calculatePrice($item['price']);
        }
        return $total;
    }
}

interface PriceStrategy {
    public function calculatePrice($price);
}

class NormalPriceStrategy implements PriceStrategy {
    public function calculatePrice($price) {
        return $price;
    }
}

class DiscountPriceStrategy implements PriceStrategy {
    public function calculatePrice($price) {
        return $price * 0.8;
    }
}

// Usage
$cart = new ShoppingCart(new NormalPriceStrategy());
$cart->addItem('Book', 15);
$cart->addItem('Pen', 5);
echo "Total Price: " . $cart->getTotalPrice(); // Output: Total Price: 20

$cart = new ShoppingCart(new DiscountPriceStrategy());
$cart->addItem('Book', 15);
$cart->addItem('Pen', 5);
echo "Discounted Total Price: " . $cart->getTotalPrice(); // Output: Discounted Total Price: 16
?>
```