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

class Cart {
    protected $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

class Observer {
    public function update($message) {
        echo "Observer: " . $message . "\n";
    }
}

class Observable {
    protected $observers = [];

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notify($message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}

class ShoppingCart extends Observable {
    protected $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    public function addProduct(Product $product) {
        $this->cart->addProduct($product);
        $this->notify("Product added: " . $product->getName());
    }

    public function getTotal() {
        $total = $this->cart->getTotal();
        $this->notify("Total: " . $total);
        return $total;
    }
}

$observer1 = new Observer();
$observer2 = new Observer();

$cart = new ShoppingCart();
$cart->addObserver($observer1);
$cart->addObserver($observer2);

$cart->addProduct(new Product("Laptop", 1200));
$cart->addProduct(new Product("Mouse", 25));
?>
```