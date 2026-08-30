```php
<?php
// Problem: Implement a simple shopping cart system that can add, remove, and display items

// Design Pattern: Observer Pattern

class ShoppingCart {
    private $observers = [];
    private $items = [];

    public function attach($observer) {
        $this->observers[] = $observer;
    }

    public function detach($observer) {
        foreach ($this->observers as $key => $value) {
            if ($value === $observer) {
                unset($this->observers[$key]);
            }
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

    public function removeItem($item) {
        $key = array_search($item, $this->items);
        if ($key !== false) {
            unset($this->items[$key]);
            $this->notify();
        }
    }

    public function getItems() {
        return $this->items;
    }
}

class Display {
    public function update($items) {
        echo "Items in cart: " . implode(", ", $items) . "<br>";
    }
}

$cart = new ShoppingCart();
$display = new Display();

$cart->attach($display);

$cart->addItem("Apple");
$cart->addItem("Banana");
$cart->removeItem("Apple");
$cart->addItem("Orange");
?>
```