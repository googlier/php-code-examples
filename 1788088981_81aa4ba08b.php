```php
<?php
class Product {
    public $name;
    public $price;
}

class ShoppingCart {
    private $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }
}

class Observer {
    public function update($message) {
        echo "Notification: " . $message . "\n";
    }
}

class Subject {
    private $observers = [];
    private $state;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify($message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }

    public function setState($state) {
        $this->state = $state;
        $this->notify("State changed to " . $this->state);
    }
}

$cart = new ShoppingCart();
$product1 = new Product();
$product1->name = "Laptop";
$product1->price = 999;

$product2 = new Product();
$product2->name = "Mouse";
$product2->price = 25;

$cart->addItem($product1);
$cart->addItem($product2);

$subject = new Subject();
$observer = new Observer();
$subject->attach($observer);

echo "Total: $" . $cart->getTotal() . "\n";

$subject->setState("Updated");

?>
```