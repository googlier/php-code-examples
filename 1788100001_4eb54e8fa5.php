```php
<?php
// Problem: Implement a simple shopping cart with the ability to add items and calculate total price

// Design Pattern: Strategy

// Define the Item interface
interface Item {
    public function getPrice();
}

// Define the ConcreteItem class
class ConcreteItem implements Item {
    private $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

// Define the ShoppingCart class
class ShoppingCart {
    private $items = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
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
$cart->addItem(new ConcreteItem(10));
$cart->addItem(new ConcreteItem(20));
echo "Total Price: " . $cart->getTotalPrice();
?>
```