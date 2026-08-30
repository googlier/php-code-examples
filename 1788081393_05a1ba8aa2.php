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

    public function getTotalPrice($prices) {
        $total = 0;
        foreach ($this->items as $item => $quantity) {
            $total += $prices[$item] * $quantity;
        }
        return $total;
    }
}

class Strategy {
    public function calculateTotal($cart, $prices) {
        return $cart->getTotalPrice($prices);
    }
}

class StrategyWithDiscount extends Strategy {
    public function calculateTotal($cart, $prices, $discount) {
        return $cart->getTotalPrice($prices) * (1 - $discount);
    }
}

$cart = new ShoppingCart();
$cart->addItem('apple', 2);
$cart->addItem('banana', 1);

$prices = ['apple' => 0.5, 'banana' => 0.3];

$strategy = new Strategy();
$total = $strategy->calculateTotal($cart, $prices);
echo "Total without discount: $" . number_format($total, 2) . "<br>";

$strategyWithDiscount = new StrategyWithDiscount();
$totalWithDiscount = $strategyWithDiscount->calculateTotal($cart, $prices, 0.1);
echo "Total with 10% discount: $" . number_format($totalWithDiscount, 2) . "<br>";
?>
```