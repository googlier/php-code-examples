```php
<?php
// Problem: Implement a simple shopping cart with the following functionalities:
// - Add items to the cart
// - Remove items from the cart
// - Get the total price of items in the cart
// - Clear the cart

// Design Pattern: Observer Pattern

class CartItem {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getTotal() {
        return $this->price * $this->quantity;
    }
}

class CartObserver {
    public function update($item) {
        echo "Item updated: " . $item->name . " - New Total: $" . $item->getTotal() . "\n";
    }
}

class ShoppingCart {
    private $items = [];
    private $observers = [];

    public function addItem($item) {
        $this->items[] = $item;
        $this->notifyObservers($item);
    }

    public function removeItem($index) {
        if (isset($this->items[$index])) {
            $item = $this->items[$index];
            unset($this->items[$index]);
            $this->notifyObservers($item);
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    public function clearCart() {
        $this->items = [];
        $this->notifyObservers(null);
    }

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    private function notifyObservers($item) {
        foreach ($this->observers as $observer) {
            $observer->update($item);
        }
    }
}

// Usage
$cart = new ShoppingCart();
$observer = new CartObserver();
$cart->addObserver($observer);

$item1 = new CartItem('Apple', 0.99, 5);
$item2 = new CartItem('Banana', 0.59, 10);

$cart->addItem($item1);
$cart->addItem($item2);
echo "Total Price: $" . $cart->getTotalPrice() . "\n";

$cart->removeItem(0);
echo "Total Price after removal: $" . $cart->getTotalPrice() . "\n";

$cart->clearCart();
echo "Total Price after clearing: $" . $cart->getTotalPrice() . "\n";
?>
```