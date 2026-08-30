```php
<?php
// Problem: Implement a simple shopping cart system that allows adding items and calculating total cost.

// Design Pattern: Singleton

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

    public function addItem($item, $price) {
        $this->items[$item] = $price;
    }

    public function getTotal() {
        return array_sum($this->items);
    }
}

// Usage
$cart = ShoppingCart::getInstance();
$cart->addItem('Book', 15);
$cart->addItem('Pen', 2);
echo "Total: " . $cart->getTotal();
?>
```