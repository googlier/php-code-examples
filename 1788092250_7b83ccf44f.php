```php
<?php
// Define the interface for a strategy
interface PaymentStrategy {
    public function pay($amount);
}

// Implement different strategies
class CreditCardPayment implements PaymentStrategy {
    private $cardNumber;

    public function __construct($cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function pay($amount) {
        return "Paid $amount using Credit Card: " . $this->cardNumber;
    }
}

class PayPalPayment implements PaymentStrategy {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function pay($amount) {
        return "Paid $amount using PayPal: " . $this->email;
    }
}

// Context class using Strategy pattern
class ShoppingCart {
    private $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategy $strategy) {
        $this->paymentStrategy = $strategy;
    }

    public function checkout($amount) {
        return $this->paymentStrategy->pay($amount);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->setPaymentStrategy(new CreditCardPayment("1234-5678-9012-3456"));
echo $cart->checkout(100);

$cart->setPaymentStrategy(new PayPalPayment("user@example.com"));
echo $cart->checkout(50);
?>
```