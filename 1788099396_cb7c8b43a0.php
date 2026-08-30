```php
<?php
// Problem: Implement a shopping cart system with the following requirements:
// - Add items to the cart
// - Remove items from the cart
// - Calculate the total price of items in the cart
// - Apply a discount to the total price

// Design Pattern: Observer Pattern

// Cart interface
interface Cart {
    public function addItem($item, $price);
    public function removeItem($item);
    public function getTotalPrice();
    public function applyDiscount($discount);
}

// Concrete Cart implementation
class ConcreteCart implements Cart {
    private $items = [];
    private $discount = 0;

    public function addItem($item, $price) {
        $this->items[$item] = $price;
    }

    public function removeItem($item) {
        unset($this->items[$item]);
    }

    public function getTotalPrice() {
        return array_sum($this->items) - ($array_sum * $this->discount / 100);
    }

    public function applyDiscount($discount) {
        $this->discount = $discount;
    }
}

// Observer interface
interface Observer {
    public function update($cart);
}

// Concrete Observer implementation
class ConcreteObserver implements Observer {
    public function update($cart) {
        echo "Total Price: " . $cart->getTotalPrice();
    }
}

// Usage
$cart = new ConcreteCart();
$observer = new ConcreteObserver();
$cart->addItem("Apple", 1.0);
$cart->addItem("Banana", 0.5);
$cart->applyDiscount(10);
$cart->update($observer);
?>
```