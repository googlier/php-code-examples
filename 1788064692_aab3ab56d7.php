```php
<?php

// Define a class to represent a product
class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

// Define a class to represent a shopping cart
class ShoppingCart {
    private $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function getTotal() {
        return array_sum(array_map(function($item) {
            return $item->getPrice();
        }, $this->items));
    }
}

// Define a strategy interface for discount calculation
interface DiscountStrategy {
    public function applyDiscount($total);
}

// Define a concrete strategy for a percentage discount
class PercentageDiscount implements DiscountStrategy {
    private $percentage;

    public function __construct($percentage) {
        $this->percentage = $percentage;
    }

    public function applyDiscount($total) {
        return $total * (1 - $this->percentage / 100);
    }
}

// Define a context class that uses a discount strategy
class ShoppingCartContext {
    private $strategy;

    public function setStrategy(DiscountStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateTotal(ShoppingCart $cart) {
        $total = $cart->getTotal();
        return $this->strategy->applyDiscount($total);
    }
}

// Create products
$product1 = new Product('Book', 20);
$product2 = new Product('Pen', 5);

// Create shopping cart and add products
$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

// Create discount strategy and context
$discountStrategy = new PercentageDiscount(10); // 10% discount
$context = new ShoppingCartContext();
$context->setStrategy($discountStrategy);

// Calculate total with discount
$total = $context->calculateTotal($cart);
echo 'Total with discount: ' . $total;

?>
```