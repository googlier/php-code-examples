```php
<?php
// Problem: Implement a simple shopping cart system that allows users to add, remove, and display items.
// Design Pattern: Observer

class Observable {
    protected $observers = [];

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver($observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers($data) {
        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }
}

class ShoppingCart implements Observer {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
        $this->notifyObservers($item . " added to cart");
    }

    public function removeItem($item) {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
            $this->notifyObservers($item . " removed from cart");
        }
    }

    public function displayCart() {
        echo "Cart contains: " . implode(", ", $this->items);
    }

    public function update($data) {
        echo $data;
    }
}

class CartView implements Observer {
    public function update($data) {
        echo "<br>View: " . $data;
    }
}

$cart = new ShoppingCart();
$cartView = new CartView();

$cart->addObserver($cartView);
$cart->addItem("Apple");
$cart->addItem("Banana");
$cart->removeItem("Apple");
$cart->displayCart();
?>
```