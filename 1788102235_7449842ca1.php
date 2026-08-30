```php
<?php
// Problem: Implement a simple shopping cart system that can add, remove, and display items.

// Design Pattern: Singleton Pattern

class ShoppingCart {
    private static $instance = null;
    private $items = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new ShoppingCart();
        }
        return self::$instance;
    }

    public function addItem($item, $quantity) {
        if (array_key_exists($item, $this->items)) {
            $this->items[$item] += $quantity;
        } else {
            $this->items[$item] = $quantity;
        }
    }

    public function removeItem($item, $quantity) {
        if (array_key_exists($item, $this->items)) {
            if ($this->items[$item] > $quantity) {
                $this->items[$item] -= $quantity;
            } else {
                unset($this->items[$item]);
            }
        }
    }

    public function displayCart() {
        echo "<h2>Shopping Cart</h2>";
        if (empty($this->items)) {
            echo "<p>Your cart is empty.</p>";
        } else {
            echo "<ul>";
            foreach ($this->items as $item => $quantity) {
                echo "<li>$item x $quantity</li>";
            }
            echo "</ul>";
        }
    }
}

// Usage
$cart = ShoppingCart::getInstance();
$cart->addItem("Apple", 3);
$cart->addItem("Banana", 2);
$cart->removeItem("Apple", 1);
$cart->displayCart();
?>
```