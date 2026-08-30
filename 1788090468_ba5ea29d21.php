```php
<?php

interface PaymentStrategy {
    public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy {
    private $cardNumber;
    private $cardHolder;
    private $cvv;
    private $expiryDate;

    public function __construct($cardNumber, $cardHolder, $cvv, $expiryDate) {
        $this->cardNumber = $cardNumber;
        $this->cardHolder = $cardHolder;
        $this->cvv = $cvv;
        $this->expiryDate = $expiryDate;
    }

    public function pay($amount) {
        echo "Paid $amount using Credit Card";
    }
}

class PayPalPayment implements PaymentStrategy {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function pay($amount) {
        echo "Paid $amount using PayPal";
    }
}

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
        $this->paymentStrategy->pay($amount);
    }
}

$cart = new ShoppingCart();
$cart->addItem("Laptop");
$cart->addItem("Mouse");
$cart->setPaymentStrategy(new CreditCardPayment("1234-5678-9012-3456", "John Doe", "123", "12/25"));
$cart->checkout(999);

?>
```