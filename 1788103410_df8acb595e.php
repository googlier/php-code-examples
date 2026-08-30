```php
<?php

// Problem: Implement a simple shopping cart using the Singleton design pattern in PHP

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

    public function getItems() {
        return $this->items;
    }
}

// Usage
$cart = ShoppingCart::getInstance();
$cart->addItem("Laptop");
$cart->addItem("Mouse");
echo implode(", ", $cart->getItems());

?>
```