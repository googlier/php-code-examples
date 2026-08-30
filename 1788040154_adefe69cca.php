```php
<?php
// Problem: Implement a simple shopping cart system that supports adding items, removing items, and calculating the total price.

// Design Pattern: Observer Pattern

// Observer Interface
interface Observer {
    public function update($item, $action);
}

// Observable Class
class ShoppingCart implements Observer {
    private $observers = [];
    private $items = [];

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify($item, $action) {
        foreach ($this->observers as $observer) {
            $observer->update($item, $action);
        }
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
        $this->notify($item, 'added');
    }

    public function removeItem($item) {
        $key = array_search($item, array_column($this->items, 'item'));
        if ($key !== false) {
            unset($this->items[$key]);
            $this->notify($item, 'removed');
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'];
        }
        return $total;
    }
}

// Concrete Observer
class PriceDisplay implements Observer {
    public function update($item, $action) {
        echo "Price of $item has been $action. New total price is " . $this->calculateTotalPrice() . "<br>";
    }

    private function calculateTotalPrice($cart) {
        return $cart->getTotalPrice();
    }
}

// Usage
$cart = new ShoppingCart();
$display = new PriceDisplay();
$cart->addObserver($display);

$cart->addItem('Apple', 0.5);
$cart->addItem('Banana', 0.3);
$cart->removeItem('Apple');
?>
```