```php
<?php
// Problem: Implement a simple shopping cart system with the ability to add and remove items.

// Design Pattern: Observer Pattern

// Interface for observers
interface Observer {
    public function update($item);
}

// Concrete observer
class ShoppingCart implements Observer {
    private $items = [];

    public function update($item) {
        $this->items[] = $item;
        echo "Item added: " . $item . "\n";
    }

    public function getItems() {
        return $this->items;
    }
}

// Subject
class Item {
    private $observers = [];

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers($item) {
        foreach ($this->observers as $observer) {
            $observer->update($item);
        }
    }
}

// Usage
$cart = new ShoppingCart();
$item = new Item();

$item->addObserver($cart);

$item->notifyObservers("Apple"); // Output: Item added: Apple
$item->notifyObservers("Banana"); // Output: Item added: Banana

$cart->getItems(); // Output: Array ( [0] => Apple [1] => Banana )

$item->removeObserver($cart);

$item->notifyObservers("Cherry"); // No output
?>
```