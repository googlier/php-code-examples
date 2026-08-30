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

class ShoppingCartDecorator {
    protected $cart;

    public function __construct(ShoppingCart $cart) {
        $this->cart = $cart;
    }

    public function addItem(Product $product) {
        $this->cart->addItem($product);
    }

    public function getTotal() {
        return $this->cart->getTotal();
    }
}

class DiscountDecorator extends ShoppingCartDecorator {
    public function getTotal() {
        $total = parent::getTotal();
        return $total * 0.9; // 10% discount
    }
}

$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 20);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);

$discountCart = new DiscountDecorator($cart);

echo "Original Total: $" . $cart->getTotal() . "<br>";
echo "Discounted Total: $" . $discountCart->getTotal();

?>
```