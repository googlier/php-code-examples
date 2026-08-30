```php
<?php
// Problem: Implement a shopping cart system that allows adding items, removing items, and calculating the total price.
// Use the Strategy design pattern to allow for different discount strategies to be applied.

class Item {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}

interface DiscountStrategy {
    public function calculateDiscount($total);
}

class NoDiscount implements DiscountStrategy {
    public function calculateDiscount($total) {
        return $total;
    }
}

class TenPercentDiscount implements DiscountStrategy {
    public function calculateDiscount($total) {
        return $total * 0.9;
    }
}

class ShoppingCart {
    private $items = [];
    private $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy) {
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function removeItem($name) {
        $this->items = array_filter($this->items, function($item) use ($name) {
            return $item->getName() !== $name;
        });
    }

    public function calculateTotal() {
        $total = array_sum(array_map(function($item) {
            return $item->getPrice();
        }, $this->items));

        return $this->discountStrategy->calculateDiscount($total);
    }
}

// Usage
$cart = new ShoppingCart(new TenPercentDiscount());
$cart->addItem(new Item("Laptop", 1000));
$cart->addItem(new Item("Mouse", 20));
echo "Total: " . $cart->calculateTotal();
?>
```