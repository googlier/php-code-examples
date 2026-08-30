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
        if (isset($this->items[$item])) {
            if ($this->items[$item] > $quantity) {
                $this->items[$item] -= $quantity;
            } else {
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
    public function applyDiscount($amount) {
        return $amount * 0.95; // 5% discount
    }
}

class ShoppingCartDecorator {
    private $cart;
    private $strategy;

    public function __construct(ShoppingCart $cart, DiscountStrategy $strategy) {
        $this->cart = $cart;
        $this->strategy = $strategy;
    }

    public function addItem($item, $quantity) {
        $this->cart->addItem($item, $quantity);
    }

    public function removeItem($item, $quantity) {
        $this->cart->removeItem($item, $quantity);
    }

    public function getTotal() {
        return $this->strategy->applyDiscount($this->cart->getTotal());
    }
}

$cart = new ShoppingCart();
$cart->addItem(10, 2); // 10 is the price of the item
$cart->addItem(20, 1); // 20 is the price of the item

$discountStrategy = new DiscountStrategy();
$decoratedCart = new ShoppingCartDecorator($cart, $discountStrategy);

echo "Total: $" . $decoratedCart->getTotal();
?>
```