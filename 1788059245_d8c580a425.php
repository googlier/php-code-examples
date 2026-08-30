```php
<?php

// Problem: Implement a simple shopping cart that can add items, remove items, and calculate the total price.

// Design Pattern: Strategy

// Item Interface
interface Item {
    public function getPrice(): float;
}

// Concrete Item 1
class Book implements Item {
    private $price;

    public function __construct(float $price) {
        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }
}

// Concrete Item 2
class Tshirt implements Item {
    private $price;

    public function __construct(float $price) {
        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }
}

// ShoppingCart Class
class ShoppingCart {
    private $items = [];

    public function addItem(Item $item): void {
        $this->items[] = $item;
    }

    public function removeItem(Item $item): void {
        $this->items = array_filter($this->items, function($cartItem) use ($item) {
            return $cartItem !== $item;
        });
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
$cart->addItem(new Book(15.99));
$cart->addItem(new Tshirt(29.99));
$cart->addItem(new Book(9.99));

echo "Total: $" . $cart->calculateTotal(); // Output: Total: $55.97

$cart->removeItem(new Book(15.99));
echo "Total after removal: $" . $cart->calculateTotal(); // Output: Total after removal: $40.98

?>
```