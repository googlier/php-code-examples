```php
<?php
// Problem: Implement a shopping cart system that supports adding items, removing items, and calculating the total price.
// Design Pattern: Observer Pattern

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
    public function update($item, $action);
}

class ShoppingCart implements Observer {
    private $items = [];

    public function update($item, $action) {
        if ($action == 'add') {
            $this->items[] = $item;
        } elseif ($action == 'remove') {
            foreach ($this->items as $index => $i) {
                if ($i->getName() == $item->getName()) {
                    unset($this->items[$index]);
                    break;
                }
            }
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class ObserverManager {
    private $observers = [];

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notify($item, $action) {
        foreach ($this->observers as $observer) {
            $observer->update($item, $action);
        }
    }
}

$cartManager = new ObserverManager();
$cart = new ShoppingCart();

$cartManager->addObserver($cart);

$item1 = new Item('Apple', 1.0);
$item2 = new Item('Banana', 0.5);

$cartManager->notify($item1, 'add');
$cartManager->notify($item2, 'add');

echo "Total Price: $" . $cart->getTotal();

$cartManager->notify($item1, 'remove');

echo "\nTotal Price After Removal: $" . $cart->getTotal();
?>
```