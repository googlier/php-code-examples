```php
<?php

// Problem: Implement a simple shopping cart system that can add items, remove items, and calculate total price.
// Design Pattern: Observer Pattern

class Item {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getPrice() {
        return $this->price * $this->quantity;
    }
}

class ShoppingCart {
    private $items = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function removeItem(Item $item) {
        $this->items = array_filter($this->items, function($i) use ($item) {
            return $i->name !== $item->name;
        });
    }

    public function getTotalPrice() {
        return array_sum(array_map(function($item) {
            return $item->getPrice();
        }, $this->items));
    }
}

class TotalPriceDisplay {
    private $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
        $this->cart->addItem($this);
    }

    public function update() {
        echo "Total Price: $" . $this->cart->getTotalPrice();
    }
}

$cart = new ShoppingCart();
$item1 = new Item("Apple", 1, 5);
$item2 = new Item("Banana", 0.5, 10);

$cart->addItem($item1);
$cart->addItem($item2);

$totalPriceDisplay = new TotalPriceDisplay($cart);

$cart->removeItem($item1);

$totalPriceDisplay->update();

?>
```