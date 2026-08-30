```php
<?php

// Problem: Implement a simple shopping cart system with functionality to add, remove, and display items.

// Design Pattern: Strategy

class ShoppingCart {
    private $items = [];

    public function addItem($item, $quantity) {
        if (!isset($this->items[$item])) {
            $this->items[$item] = $quantity;
        } else {
            $this->items[$item] += $quantity;
        }
    }

    public function removeItem($item, $quantity) {
        if (isset($this->items[$item])) {
            if ($this->items[$item] > $quantity) {
                $this->items[$item] -= $quantity;
            } else {
                unset($this->items[$item]);
            }
        }
    }

    public function displayItems() {
        foreach ($this->items as $item => $quantity) {
            echo "$item: $quantity\n";
        }
    }
}

$cart = new ShoppingCart();
$cart->addItem('Apple', 3);
$cart->addItem('Banana', 2);
$cart->removeItem('Apple', 1);
$cart->displayItems();

?>
```