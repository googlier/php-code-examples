```php
<?php

// Problem: Implement a simple shopping cart system with the ability to add, remove, and display items. Use the Singleton design pattern to ensure only one instance of the shopping cart exists.

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
        if (!isset($this->items[$item])) {
            $this->items[$item] = $quantity;
        } else {
            $this->items[$item] += $quantity;
        }
    }

    public function removeItem($item, $quantity) {
        if (isset($this->items[$item])) {
            if ($this->items[$item] > $quantity) {
                $this->items[$item] -= $quantity;
            } else {
                unset($this->items[$item]);
            }
        }
    }

    public function displayCart() {
        echo "Shopping Cart:\n";
        foreach ($this->items as $item => $quantity) {
            echo "$item: $quantity\n";
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