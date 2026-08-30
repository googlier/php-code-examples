```php
<?php
// Problem: Implement a system to calculate the total price of items in a shopping cart. Each item has a name, price, and quantity. Use the Observer design pattern to notify the system when the quantity of an item changes.

// Define the Observer interface
interface Observer {
    public function update($item, $newQuantity);
}

// Define the Subject class
class ShoppingCart implements Observer {
    private $observers = [];
    private $items = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        foreach ($this->observers as $key => $o) {
            if ($o === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify($item, $newQuantity) {
        foreach ($this->observers as $observer) {
            $observer->update($item, $newQuantity);
        }
    }

    public function addItem($item, $price, $quantity) {
        $this->items[$item] = ['price' => $price, 'quantity' => $quantity];
        $this->notify($item, $quantity);
    }

    public function updateItemQuantity($item, $newQuantity) {
        if (isset($this->items[$item])) {
            $this->items[$item]['quantity'] = $newQuantity;
            $this->notify($item, $newQuantity);
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item => $details) {
            $total += $details['price'] * $details['quantity'];
        }
        return $total;
    }
}

// Define the Concrete Observer class
class PriceCalculator implements Observer {
    public function update($item, $newQuantity) {
        echo "Price of $item changed to " . ($newQuantity * $this->getItemPrice($item)) . "\n";
    }

    private function getItemPrice($item) {
        // Assume prices are stored in an external database or array
        $prices = ['apple' => 1, 'banana' => 0.5, 'orange' => 0.75];
        return $prices[$item];
    }
}

// Usage
$cart = new ShoppingCart();
$calculator = new PriceCalculator();
$cart->attach($calculator);

$cart->addItem('apple', 1, 5);
$cart->addItem('banana', 0.5, 3);
$cart->updateItemQuantity('apple', 3);
echo "Total price: " . $cart->getTotalPrice() . "\n";
?>
```