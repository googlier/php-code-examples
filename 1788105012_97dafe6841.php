```php
<?php
// Problem: Implement a simple shopping cart system with the ability to add and remove items.

// Design Pattern: Singleton

class ShoppingCart {
    private static $instance = null;
    private $items = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new ShoppingCart();
        }
        return self::$instance;
    }

    public function addItem($item, $quantity) {
        $this->items[$item] = $quantity;
    }

    public function removeItem($item) {
        if (isset($this->items[$item])) {
            unset($this->items[$item]);
        }
    }

    public function getItems() {
        return $this->items;
    }
}

// Usage
$cart = ShoppingCart::getInstance();
$cart->addItem("Apple", 2);
$cart->addItem("Banana", 3);
$cart->removeItem("Apple");
print_r($cart->getItems());
?>
```