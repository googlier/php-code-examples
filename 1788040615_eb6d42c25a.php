```php
<?php

// Problem: Implement a shopping cart system that supports adding items, removing items, and calculating the total price.
// Design Pattern: Observer

class Item {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}

interface Observer {
    public function update($item);
}

class ShoppingCart implements Observer {
    private $items = [];
    private $total = 0;

    public function update($item) {
        $this->items[] = $item;
        $this->total += $item->getPrice();
    }

    public function getTotal() {
        return $this->total;
    }

    public function removeItem($name) {
        foreach ($this->items as $key => $item) {
            if ($item->getName() == $name) {
                $this->total -= $item->getPrice();
                unset($this->items[$key]);
                break;
            }
        }
    }
}

class CartObserver implements Observer {
    public function update($item) {
        echo "Item added: " . $item->getName() . " Price: $" . $item->getPrice() . "\n";
    }
}

$cart = new ShoppingCart();
$observer = new CartObserver();

$cart->update(new Item("Apple", 0.50));
$cart->update(new Item("Banana", 0.30));
$cart->removeItem("Banana");

echo "Total: $" . $cart->getTotal() . "\n";

?>
```