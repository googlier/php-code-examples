```php
<?php
// Problem: Implement a simple shopping cart system with functions to add items, remove items, and calculate total price.

// Design Pattern: Observer Pattern

// CartItem.php
class CartItem {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getTotalPrice() {
        return $this->price * $this->quantity;
    }
}

// ShoppingCart.php
class ShoppingCart {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function removeItem($item) {
        $key = array_search($item, $this->items);
        if ($key !== false) {
            unset($this->items[$key]);
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotalPrice();
        }
        return $total;
    }
}

// Observer.php
interface Observer {
    public function update($message);
}

// ShoppingCartObserver.php
class ShoppingCartObserver implements Observer {
    public function update($message) {
        echo "Observer: " . $message . "\n";
    }
}

// Usage
$cart = new ShoppingCart();
$observer = new ShoppingCartObserver();

$cart->addItem(new CartItem("Laptop", 999.99, 1));
$cart->addItem(new CartItem("Mouse", 29.99, 2));

$cart->removeItem($cart->items[1]);

echo "Total Price: " . $cart->getTotalPrice() . "\n";

$cart->addItem(new CartItem("Keyboard", 49.99, 1));

echo "Total Price: " . $cart->getTotalPrice() . "\n";
?>
```