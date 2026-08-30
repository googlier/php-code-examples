```php
<?php

// Problem: Implement a simple shopping cart system using the Singleton design pattern

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

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}

// Usage
$cart = ShoppingCart::getInstance();
$cart->addItem(['name' => 'Book', 'price' => 10, 'quantity' => 2]);
$cart->addItem(['name' => 'Pen', 'price' => 2, 'quantity' => 5]);

echo "Total: " . $cart->getTotal();

?>
```