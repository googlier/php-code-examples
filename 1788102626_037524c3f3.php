```php
<?php

// Problem: Create a function to calculate the total cost of items in a cart.
// Each item has a price and quantity. The function should return the total cost.

class Item {
    public $price;
    public $quantity;

    public function __construct($price, $quantity) {
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

class Cart {
    private $items = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function getTotalCost() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }
}

$cart = new Cart();
$cart->addItem(new Item(10, 2));
$cart->addItem(new Item(5, 3));

echo "Total cost: " . $cart->getTotalCost();

?>
```