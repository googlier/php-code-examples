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

class DiscountStrategy {
    public function applyDiscount($total) {
        return $total * 0.95;
    }
}

class ShoppingCartWithDiscount implements ShoppingCart {
    protected $shoppingCart;
    protected $discountStrategy;

    public function __construct(ShoppingCart $shoppingCart, DiscountStrategy $discountStrategy) {
        $this->shoppingCart = $shoppingCart;
        $this->discountStrategy = $discountStrategy;
    }

    public function addItem(Product $product) {
        $this->shoppingCart->addItem($product);
    }

    public function getTotal() {
        $total = $this->shoppingCart->getTotal();
        return $this->discountStrategy->applyDiscount($total);
    }
}

$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 25);

$shoppingCart = new ShoppingCart();
$shoppingCart->addItem($product1);
$shoppingCart->addItem($product2);

$discountStrategy = new DiscountStrategy();
$discountedCart = new ShoppingCartWithDiscount($shoppingCart, $discountStrategy);

echo "Total Price without discount: " . $shoppingCart->getTotal() . "\n";
echo "Total Price with discount: " . $discountedCart->getTotal() . "\n";

?>
```