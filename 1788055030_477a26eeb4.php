```php
<?php

class Inventory {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getItem($index) {
        return $this->items[$index] ?? null;
    }
}

class Strategy {
    public function execute($inventory) {}
}

class FirstItemStrategy implements Strategy {
    public function execute($inventory) {
        if (!empty($inventory->items)) {
            echo $inventory->getItem(0);
        } else {
            echo "No items in inventory.";
        }
    }
}

class LastItemStrategy implements Strategy {
    public function execute($inventory) {
        if (!empty($inventory->items)) {
            echo $inventory->getItem(count($inventory->items) - 1);
        } else {
            echo "No items in inventory.";
        }
    }
}

$inventory = new Inventory();
$inventory->addItem("Apple");
$inventory->addItem("Banana");
$inventory->addItem("Cherry");

$strategy = new LastItemStrategy();
$strategy->execute($inventory);

?>
```