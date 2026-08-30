```php
<?php

// Problem: Implement a simple shopping cart using the Strategy pattern to allow different payment methods.

// Define the PaymentStrategy interface
interface PaymentStrategy {
    public function pay($amount);
}

// Implement the CreditCardPayment class
class CreditCardPayment implements PaymentStrategy {
    private $cardNumber;
    private $name;

    public function __construct($cardNumber, $name) {
        $this->cardNumber = $cardNumber;
        $this->name = $name;
    }

    public function pay($amount) {
        echo "Paid $amount using Credit Card ($this->cardNumber) by $this->name\n";
    }
}

// Implement the PayPalPayment class
class PayPalPayment implements PaymentStrategy {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function pay($amount) {
        echo "Paid $amount using PayPal ($this->email)\n";
    }
}

// Implement the ShoppingCart class
class ShoppingCart {
    private $items = [];
    private $paymentStrategy;

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getItems() {
        return $this->items;
    }

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function checkout($amount) {
        echo "Total items: " . count($this->items) . "\n";
        echo "Total amount: $amount\n";
        $this->paymentStrategy->pay($amount);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem("Book");
$cart->addItem("Pen");
$cart->setPaymentStrategy(new CreditCardPayment("1234-5678-9012-3456", "John Doe"));
$cart->checkout(25.50);

?>
```