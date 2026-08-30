```php
<?php

interface PaymentStrategy {
    public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy {
    private $cardNumber;
    private $name;

    public function __construct($cardNumber, $name) {
        $this->cardNumber = $cardNumber;
        $this->name = $name;
    }

    public function pay($amount) {
        echo "Paid $amount using Credit Card: $this->cardNumber\n";
    }
}

class PayPalPayment implements PaymentStrategy {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function pay($amount) {
        echo "Paid $amount using PayPal: $this->email\n";
    }
}

class ShoppingCart {
    private $items = [];
    private $strategy;

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function setPaymentStrategy(PaymentStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function checkout() {
        $total = array_sum($this->items);
        $this->strategy->pay($total);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem(100);
$cart->addItem(50);

$creditCard = new CreditCardPayment("1234-5678-9012-3456", "John Doe");
$paypal = new PayPalPayment("john.doe@example.com");

echo "Checking out with Credit Card:\n";
$cart->setPaymentStrategy($creditCard);
$cart->checkout();

echo "\nChecking out with PayPal:\n";
$cart->setPaymentStrategy($paypal);
$cart->checkout();

?>
```