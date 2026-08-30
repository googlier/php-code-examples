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

class Order {
    protected $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function processOrder() {
        $total = $this->cart->getTotal();
        // Simulate payment processing
        if ($total > 0) {
            echo "Order processed. Total: $" . $total . "\n";
        } else {
            echo "No items in cart.\n";
        }
    }
}

// Usage
$product1 = new Product("Laptop", 999);
$product2 = new Product("Mouse", 25);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$order = new Order($cart);
$order->processOrder();

?>
```