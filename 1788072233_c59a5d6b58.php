```php
<?php
// Problem: Implement a function to calculate the total cost of items in a shopping cart.
// Each item has a name, quantity, and price per unit.

class ShoppingCart {
    private $items = [];

    public function addItem($name, $quantity, $pricePerUnit) {
        $this->items[] = ['name' => $name, 'quantity' => $quantity, 'pricePerUnit' => $pricePerUnit];
    }

    public function getTotalCost() {
        return array_sum(array_map(function($item) {
            return $item['quantity'] * $item['pricePerUnit'];
        }, $this->items));
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem('Apple', 2, 0.5);
$cart->addItem('Banana', 5, 0.3);
echo 'Total Cost: $' . $cart->getTotalCost();
?>
```