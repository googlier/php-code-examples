```php
<?php
class Product {
    protected $name;
    protected $price;

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

class ShoppingCart {
    protected $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class Observer {
    public function update($message) {
        echo $message;
    }
}

class Subject {
    protected $observers = [];
    protected $state;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update('The total has changed.');
        }
    }

    public function setState($state) {
        $this->state = $state;
        $this->notify();
    }

    public function getState() {
        return $this->state;
    }
}

$cart = new ShoppingCart();
$product1 = new Product('Laptop', 1200);
$product2 = new Product('Mouse', 20);
$cart->addItem($product1);
$cart->addItem($product2);

$subject = new Subject();
$observer = new Observer();
$subject->attach($observer);

echo "Initial Total: " . $cart->getTotal() . "\n";
$subject->setState($cart->getTotal());

$product3 = new Product('Keyboard', 50);
$cart->addItem($product3);
$subject->setState($cart->getTotal());
?>
```