```php
<?php

class Inventory {
    protected $items = [];

    public function addItem($item, $quantity) {
        if (!isset($this->items[$item])) {
            $this->items[$item] = 0;
        }
        $this->items[$item] += $quantity;
    }

    public function removeItem($item, $quantity) {
        if (isset($this->items[$item]) && $this->items[$item] >= $quantity) {
            $this->items[$item] -= $quantity;
            if ($this->items[$item] == 0) {
                unset($this->items[$item]);
            }
        }
    }

    public function getStock($item) {
        return isset($this->items[$item]) ? $this->items[$item] : 0;
    }
}

class Order {
    protected $items = [];
    protected $inventory;

    public function __construct(Inventory $inventory) {
        $this->inventory = $inventory;
    }

    public function addItem($item, $quantity) {
        if ($this->inventory->getStock($item) >= $quantity) {
            $this->inventory->removeItem($item, $quantity);
            $this->items[$item] = $quantity;
        } else {
            throw new Exception("Not enough stock for item: $item");
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item => $quantity) {
            $total += $quantity * 10; // Assuming each item costs $10
        }
        return $total;
    }
}

$inventory = new Inventory();
$inventory->addItem("apple", 10);
$inventory->addItem("banana", 5);

$order = new Order($inventory);
$order->addItem("apple", 3);
$order->addItem("banana", 2);

echo "Total cost: $" . $order->getTotal();

?>
```