```php
<?php
// Problem: Implement a simple shopping cart system using the Observer Design Pattern

// Observer Interface
interface Observer {
    public function update($product, $quantity);
}

// Observable Interface
interface Observable {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify($product, $quantity);
}

// Concrete Subject
class ShoppingCart implements Observable {
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

    public function notify($product, $quantity) {
        foreach ($this->observers as $observer) {
            $observer->update($product, $quantity);
        }
    }

    public function addItem($product, $quantity) {
        $this->items[$product] += $quantity;
        $this->notify($product, $quantity);
    }

    public function removeItem($product, $quantity) {
        if (isset($this->items[$product]) && $this->items[$product] >= $quantity) {
            $this->items[$product] -= $quantity;
            $this->notify($product, -$quantity);
        }
    }

    public function getItems() {
        return $this->items;
    }
}

// Concrete Observer
class EmailNotification implements Observer {
    public function update($product, $quantity) {
        $action = $quantity > 0 ? 'Added' : 'Removed';
        echo "Email Notification: Product '{$product}' {$action} by {$quantity} units.\n";
    }
}

class LogNotification implements Observer {
    public function update($product, $quantity) {
        $action = $quantity > 0 ? 'Added' : 'Removed';
        echo "Log Notification: Product '{$product}' {$action} by {$quantity} units.\n";
    }
}

// Usage
$cart = new ShoppingCart();
$emailNotification = new EmailNotification();
$logNotification = new LogNotification();

$cart->attach($emailNotification);
$cart->attach($logNotification);

$cart->addItem('Laptop', 2);
$cart->removeItem('Laptop', 1);
$cart->addItem('Mouse', 1);
?>
```