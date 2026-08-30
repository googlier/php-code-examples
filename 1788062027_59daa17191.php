```php
<?php

class Product
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class ShoppingCart
{
    private $items = [];

    public function addItem(Product $product)
    {
        $this->items[] = $product;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

class Strategy
{
    public function calculate($total)
    {
        return $total;
    }
}

class DiscountStrategy extends Strategy
{
    private $discount;

    public function __construct($discount)
    {
        $this->discount = $discount;
    }

    public function calculate($total)
    {
        return $total - ($total * $this->discount);
    }
}

class ShoppingCartContext
{
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function calculateTotal(ShoppingCart $cart)
    {
        $total = $cart->getTotal();
        return $this->strategy->calculate($total);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem(new Product("Laptop", 1000));
$cart->addItem(new Product("Mouse", 50));

$context = new ShoppingCartContext(new Strategy());
$total = $context->calculateTotal($cart);
echo "Total: " . $total . "\n";

$context->setStrategy(new DiscountStrategy(0.1));
$totalWithDiscount = $context->calculateTotal($cart);
echo "Total with 10% discount: " . $totalWithDiscount . "\n";

?>
```