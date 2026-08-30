```php
<?php
// Problem: Implement a function that calculates the total price of items in a shopping cart after applying a discount.
// Design Pattern: Strategy

// Define the Item interface
interface Item {
    public function getPrice(): float;
}

// Define the ShoppingCart class
class ShoppingCart {
    private $items = [];

    public function addItem(Item $item): void {
        $this->items[] = $item;
    }

    public function calculateTotalPrice(DiscountStrategy $discountStrategy): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $discountStrategy->applyDiscount($total);
    }
}

// Define the DiscountStrategy interface
interface DiscountStrategy {
    public function applyDiscount(float $price): float;
}

// Define the NoDiscountStrategy class
class NoDiscountStrategy implements DiscountStrategy {
    public function applyDiscount(float $price): float {
        return $price;
    }
}

// Define the PercentageDiscountStrategy class
class PercentageDiscountStrategy implements DiscountStrategy {
    private $percentage;

    public function __construct(float $percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount(float $price): float {
        return $price - ($price * ($this->percentage / 100));
    }
}

// Define the FixedAmountDiscountStrategy class
class FixedAmountDiscountStrategy implements DiscountStrategy {
    private $amount;

    public function __construct(float $amount) {
        $this->amount = $amount;
    }

    public function applyDiscount(float $price): float {
        return $price - $this->amount;
    }
}

// Example usage
$item1 = new class implements Item {
    public function getPrice(): float {
        return 100;
    }
};

$item2 = new class implements Item {
    public function getPrice(): float {
        return 200;
    }
};

$cart = new ShoppingCart();
$cart->addItem($item1);
$cart->addItem($item2);

$noDiscount = new NoDiscountStrategy();
$percentageDiscount = new PercentageDiscountStrategy(10);
$fixedAmountDiscount = new FixedAmountDiscountStrategy(50);

echo "No Discount: " . $cart->calculateTotalPrice($noDiscount) . "\n";
echo "10% Discount: " . $cart->calculateTotalPrice($percentageDiscount) . "\n";
echo "Fixed Amount Discount: " . $cart->calculateTotalPrice($fixedAmountDiscount) . "\n";
?>
```