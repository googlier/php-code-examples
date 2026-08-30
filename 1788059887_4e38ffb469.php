```php
<?php
// Problem: Implement a simple shopping cart system that can add items and calculate total price
// Design Pattern: Strategy

// Item interface
interface Item {
    public function getPrice(): float;
    public function getName(): string;
}

// Concrete item class
class Book implements Item {
    private $name;
    private $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getName(): string {
        return $this->name;
    }
}

class Fruit implements Item {
    private $name;
    private $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getName(): string {
        return $this->name;
    }
}

// ShoppingCart class using Strategy pattern
class ShoppingCart {
    private $items = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function calculateTotal(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem(new Book("PHP Programming", 29.99));
$cart->addItem(new Fruit("Apples", 1.50));

echo "Total Price: $" . $cart->calculateTotal();
?>
```