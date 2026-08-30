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

interface PaymentStrategy {
    public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy {
    private $cardNumber;

    public function __construct($cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function pay($amount) {
        return "Paid with credit card: $amount\n";
    }
}

class PayPalPayment implements PaymentStrategy {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function pay($amount) {
        return "Paid with PayPal: $amount\n";
    }
}

class ShoppingCart {
    private $products = [];
    private $paymentStrategy;

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function checkout() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $this->paymentStrategy->pay($total);
    }
}

// Usage
$product1 = new Product("Laptop", 999);
$product2 = new Product("Mouse", 25);

$cart = new ShoppingCart();
$cart->addProduct($product1);
$cart->addProduct($product2);

$cart->setPaymentStrategy(new CreditCardPayment("1234-5678-9012-3456"));
echo $cart->checkout();

$cart->setPaymentStrategy(new PayPalPayment("user@example.com"));
echo $cart->checkout();

?>
```