```php
<?php

// Random Design Pattern: Strategy

interface PaymentStrategy {
    public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy {
    private $cardNumber;

    public function __construct($cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function pay($amount) {
        return "Paid $amount using Credit Card: $this->cardNumber";
    }
}

class PayPalPayment implements PaymentStrategy {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function pay($amount) {
        return "Paid $amount using PayPal: $this->email";
    }
}

class ShoppingCart {
    private $items = [];
    private $strategy;

    public function setPaymentStrategy(PaymentStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function calculateTotal() {
        return array_sum($this->items);
    }

    public function checkout() {
        $total = $this->calculateTotal();
        return $this->strategy->pay($total);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem(100);
$cart->addItem(50);

$creditCard = new CreditCardPayment("1234-5678-9012-3456");
$paypal = new PayPalPayment("user@example.com");

echo $cart->setPaymentStrategy($creditCard)->checkout() . "\n";
echo $cart->setPaymentStrategy($paypal)->checkout() . "\n";

?>
```