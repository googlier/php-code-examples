```php
<?php

class Inventory {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getItems() {
        return $this->items;
    }
}

class Order {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getItems() {
        return $this->items;
    }
}

class Item {
    private $name;
    private $quantity;

    public function __construct($name, $quantity) {
        $this->name = $name;
        $this->quantity = $quantity;
    }

    public function getName() {
        return $this->name;
    }

    public function getQuantity() {
        return $this->quantity;
    }
}

class InventoryManager {
    private $inventory;

    public function __construct() {
        $this->inventory = new Inventory();
    }

    public function placeOrder($order) {
        foreach ($order->getItems() as $item) {
            if ($item->getQuantity() > 0) {
                $this->inventory->addItem($item);
                echo "Added {$item->getQuantity()} {$item->getName()}(s) to inventory.\n";
            } else {
                echo "Failed to add {$item->getQuantity()} {$item->getName()}(s) to inventory.\n";
            }
        }
    }
}

$inventoryManager = new InventoryManager();
$order = new Order();
$order->addItem(new Item("Apple", 10));
$order->addItem(new Item("Banana", 5));
$order->addItem(new Item("Orange", 0));

$inventoryManager->placeOrder($order);

?>
```