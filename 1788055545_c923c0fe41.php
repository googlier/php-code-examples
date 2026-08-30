```php
<?php
// Problem: Implement a simple shopping cart system that allows adding items, removing items, and calculating the total price.

// Design Pattern: Observer Pattern

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

interface Observer {
    public function update($item);
}

class ShoppingCart {
    private $items = [];
    private $observers = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
        $this->notifyObservers($item);
    }

    public function removeItem(Item $item) {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
            $this->notifyObservers($item);
        }
    }

    public function registerObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    private function notifyObservers($item) {
        foreach ($this->observers as $observer) {
            $observer->update($item);
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class Display implements Observer {
    public function update($item) {
        echo "Item added/removed: {$item->getName()}, Total Price: " . $this->calculateTotalPrice() . "<br>";
    }

    private function calculateTotalPrice() {
        global $cart;
        return $cart->getTotalPrice();
    }
}

$cart = new ShoppingCart();
$display = new Display();

$cart->registerObserver($display);

$item1 = new Item('Apple', 1.50);
$item2 = new Item('Banana', 0.75);

$cart->addItem($item1);
$cart->addItem($item2);
$cart->removeItem($item1);
?>
```