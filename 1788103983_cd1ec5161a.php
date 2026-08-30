```php
<?php
// Problem: Implement a shopping cart system with the ability to add items, remove items, and calculate total price. Use the Observer design pattern to notify when the cart's total changes.

// Design Pattern: Observer

// Cart.php
class Cart {
    private $observers = [];
    private $items = [];
    private $total = 0;

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver($observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function addItem($item, $price) {
        $this->items[$item] = $price;
        $this->total += $price;
        $this->notifyObservers();
    }

    public function removeItem($item) {
        if (isset($this->items[$item])) {
            $this->total -= $this->items[$item];
            unset($this->items[$item]);
            $this->notifyObservers();
        }
    }

    public function getTotal() {
        return $this->total;
    }

    private function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this->total);
        }
    }
}

// ObserverInterface.php
interface ObserverInterface {
    public function update($total);
}

// TotalDisplay.php
class TotalDisplay implements ObserverInterface {
    public function update($total) {
        echo "Total: $" . $total . "\n";
    }
}

// Usage
$cart = new Cart();
$display = new TotalDisplay();
$cart->addObserver($display);

$cart->addItem("Apple", 0.5);
$cart->addItem("Banana", 0.3);
$cart->removeItem("Apple");

$cart->addItem("Cherry", 0.2);
?>
```