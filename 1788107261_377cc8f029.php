```php
<?php
// Problem: Implement a simple shopping cart system that supports adding items, removing items, and calculating the total price.

// Design Pattern: Factory Method

abstract class Item {
    abstract public function getName();
    abstract public function getPrice();
}

class Product extends Item {
    private $name;
    private $price;

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

class Service implements Item {
    private $name;
    private $price;

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
    private $items = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function removeItem(Item $item) {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem(new Product("Laptop", 1000));
$cart->addItem(new Service("Shipping", 50));
echo "Total Price: $" . $cart->getTotalPrice(); // Output: Total Price: $1050
?>
```