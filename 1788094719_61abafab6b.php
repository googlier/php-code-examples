```php
<?php
// Random Programming Problem: Implement a simple shopping cart using the Strategy Design Pattern

// Define the ShoppingCart interface
interface ShoppingCart {
    public function addItem($item, $quantity);
    public function removeItem($item);
    public function getTotal();
}

// Implement a ConcreteStrategy for calculating total
class BasicTotalStrategy implements ShoppingCart {
    private $items = [];
    public function addItem($item, $quantity) {
        $this->items[$item] = $quantity;
    }
    public function removeItem($item) {
        unset($this->items[$item]);
    }
    public function getTotal() {
        return array_sum($this->items);
    }
}

// Implement a ConcreteStrategy for calculating total with a discount
class DiscountTotalStrategy implements ShoppingCart {
    private $items = [];
    private $discount = 0.1;
    public function addItem($item, $quantity) {
        $this->items[$item] = $quantity;
    }
    public function removeItem($item) {
        unset($this->items[$item]);
    }
    public function getTotal() {
        return array_sum($this->items) * (1 - $this->discount);
    }
}

// Client code to use the Strategy Pattern
$cart = new BasicTotalStrategy();
$cart->addItem('Apple', 3);
$cart->addItem('Banana', 2);
echo "Total: " . $cart->getTotal() . "\n";

$cart = new DiscountTotalStrategy();
$cart->addItem('Apple', 3);
$cart->addItem('Banana', 2);
echo "Total with Discount: " . $cart->getTotal() . "\n";
?>
```