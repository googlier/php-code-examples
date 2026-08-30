```php
<?php
// Problem: Implement a simple shopping cart using the Observer design pattern. The cart should notify observers (like a checkout system) when an item is added.

// Define the Observer interface
interface Observer {
    public function update($item);
}

// Define the Subject (Cart) class
class Cart implements Observer {
    private $observers = [];
    private $items = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->items);
        }
    }

    public function addItem($item) {
        $this->items[] = $item;
        $this->notify();
    }
}

// Define the Concrete Observer (Checkout) class
class Checkout implements Observer {
    public function update($item) {
        echo "Checkout notified of new item: " . implode(", ", $item) . PHP_EOL;
    }
}

// Usage
$cart = new Cart();
$checkout = new Checkout();

$cart->attach($checkout);

$cart->addItem(['Apple', 'Banana']);
$cart->addItem(['Orange']);
?>
```