```php
<?php
// Problem: Implement a shopping cart system that supports adding items, removing items, and calculating the total price.
// Design Pattern: Observer

class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class ShoppingCart {
    private $items = [];
    private $observers = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
        $this->notifyObservers();
    }

    public function removeItem(Item $item) {
        $this->items = array_filter($this->items, function($i) use ($item) {
            return $i !== $item;
        });
        $this->notifyObservers();
    }

    public function getTotalPrice() {
        return array_reduce($this->items, function($carry, $item) {
            return $carry + $item->price;
        }, 0);
    }

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    private function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

interface Observer {
    public function update();
}

class TotalPriceDisplay implements Observer {
    private $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
        $cart->addObserver($this);
    }

    public function update() {
        echo "Total Price: $" . $this->cart->getTotalPrice() . "\n";
    }
}

// Usage
$cart = new ShoppingCart();
$totalPriceDisplay = new TotalPriceDisplay($cart);

$item1 = new Item("Laptop", 1200);
$item2 = new Item("Mouse", 20);

$cart->addItem($item1);
$cart->addItem($item2);

$cart->removeItem($item2);
?>
```