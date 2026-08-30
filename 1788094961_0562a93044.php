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

    public function removeItem($item, $quantity) {
        if (isset($this->items[$item]) && $this->items[$item] >= $quantity) {
            $this->items[$item] -= $quantity;
            if ($this->items[$item] == 0) {
                unset($this->items[$item]);
            }
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item => $quantity) {
            $total += $item * $quantity;
        }
        return $total;
    }
}

class DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.9;
    }
}

class ShoppingCartContext {
    private $cart;
    private $discountStrategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $discountStrategy) {
        $this->cart = $cart;
        $this->discountStrategy = $discountStrategy;
    }

    public function checkout() {
        $total = $this->cart->getTotal();
        return $this->discountStrategy->applyDiscount($total);
    }
}

$cart = new ShoppingCart();
$cart->addItem(10, 2);
$cart->addItem(5, 3);
$discountStrategy = new DiscountStrategy();
$context = new ShoppingCartContext($cart, $discountStrategy);
echo $context->checkout();
?>
```