```php
<?php
// Problem: Implement a shopping cart system using the Singleton design pattern.

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

    public function removeItem($item) {
        unset($this->items[$item]);
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
$cart->addItem(5, 3);
$cart->removeItem(5);
echo "Total: " . $cart->getTotal();
echo "<br>";
print_r($cart->getItems());
?>
```