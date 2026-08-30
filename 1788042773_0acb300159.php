```php
<?php
// Problem: Implement a shopping cart system with the ability to add, remove, and calculate total price. Use the Observer design pattern to notify when the cart is updated.

// Product Interface
interface Product {
    public function getName();
    public function getPrice();
}

// Concrete Product
class Book implements Product {
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

// ShoppingCart Interface
interface ShoppingCart {
    public function addObserver($observer);
    public function removeObserver($observer);
    public function notifyObservers();
    public function addItem($item);
    public function removeItem($item);
    public function getTotalPrice();
}

// ShoppingCart implementation
class SimpleCart implements ShoppingCart {
    private $items = [];
    private $observers = [];

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver($observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function addItem($item) {
        $this->items[] = $item;
        $this->notifyObservers();
    }

    public function removeItem($item) {
        $key = array_search($item, $this->items);
        if ($key !== false) {
            unset($this->items[$key]);
        }
        $this->notifyObservers();
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

// Observer Interface
interface CartObserver {
    public function update($cart);
}

// Concrete Observer
class CartDisplay implements CartObserver {
    public function update($cart) {
        echo "Cart Total: $" . $cart->getTotalPrice() . "\n";
    }
}

// Example usage
$cart = new SimpleCart();
$display = new CartDisplay();
$cart->addObserver($display);

$book1 = new Book("Book 1", 10);
$book2 = new Book("Book 2", 20);

$cart->addItem($book1);
$cart->addItem($book2);
?>
```