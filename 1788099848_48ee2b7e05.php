```php
<?php
// Problem: Implement a simple shopping cart with the ability to add items, remove items, and calculate the total price.
// Design Pattern: Observer Pattern

class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class Cart {
    private $items = [];
    private $observers = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
        $this->notifyObservers();
    }

    public function removeItem(Item $item) {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
            $this->notifyObservers();
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class DisplayTotal implements Observer {
    public function update(Cart $cart) {
        echo "Total Price: $" . $cart->getTotalPrice() . "\n";
    }
}

$cart = new Cart();
$displayTotal = new DisplayTotal();
$cart->addObserver($displayTotal);

$item1 = new Item("Laptop", 1000);
$item2 = new Item("Mouse", 20);

$cart->addItem($item1);
$cart->addItem($item2);
$cart->removeItem($item1);
?>
```