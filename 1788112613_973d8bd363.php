```php
<?php

// Problem: Implement a simple shopping cart system using the Singleton design pattern.

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

    public function removeItem($item) {
        if (array_key_exists($item, $this->items)) {
            unset($this->items[$item]);
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item => $quantity) {
            $total += $item * $quantity;
        }
        return $total;
    }

    public function getItems() {
        return $this->items;
    }
}

// Usage
$cart = ShoppingCart::getInstance();
$cart->addItem(10, 2);
$cart->addItem(20, 1);
$cart->removeItem(10);
echo "Total: " . $cart->getTotal();

?>
```