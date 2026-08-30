```php
<?php
// Problem: Implement a shopping cart system that allows adding items, removing items, and calculating the total price.
// Design Pattern: Strategy

class ShoppingCart {
    private $items = [];
    private $pricingStrategy;

    public function __construct($pricingStrategy) {
        $this->pricingStrategy = $pricingStrategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function removeItem($item) {
        $this->items = array_filter($this->items, function($i) use ($item) {
            return $i['item'] != $item;
        });
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $this->pricingStrategy->calculatePrice($item['price']);
        }
        return $total;
    }
}

interface PricingStrategy {
    public function calculatePrice($price);
}

class NormalPricingStrategy implements PricingStrategy {
    public function calculatePrice($price) {
        return $price;
    }
}

class DiscountPricingStrategy implements PricingStrategy {
    public function calculatePrice($price) {
        return $price * 0.9;
    }
}

// Usage
$cart = new ShoppingCart(new NormalPricingStrategy());
$cart->addItem('Book', 15);
$cart->addItem('Pen', 2);
echo "Total: $" . $cart->getTotal(); // Total: $17

$cart->addItem('Notebook', 10);
$cart->removeItem('Pen');
$cart->pricingStrategy = new DiscountPricingStrategy();
echo "Total with Discount: $" . $cart->getTotal(); // Total with Discount: $17.1
?>
```