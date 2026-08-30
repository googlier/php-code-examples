```php
<?php

// Problem: Implement a simple shopping cart using the Singleton design pattern. The shopping cart should allow adding and removing items, and it should be a global point of access.

// Solution:

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

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function removeItem($item) {
        $this->items = array_filter($this->items, function($value) use ($item) {
            return $value !== $item;
        });
    }

    public function getItems() {
        return $this->items;
    }
}

// Usage

$cart = ShoppingCart::getInstance();
$cart->addItem("Apple");
$cart->addItem("Banana");
$cart->removeItem("Apple");
print_r($cart->getItems());

?>
```