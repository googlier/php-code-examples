```php
<?php

// Define an interface for a payment gateway
interface PaymentGateway {
    public function pay($amount);
}

// Implement the PaymentGateway interface using the Singleton design pattern
class CreditCardPayment implements PaymentGateway {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new CreditCardPayment();
        }
        return self::$instance;
    }

    public function pay($amount) {
        echo "Paid $amount using Credit Card";
    }
}

// Implement the PaymentGateway interface using the Factory design pattern
class PayPalPayment implements PaymentGateway {
    public function pay($amount) {
        echo "Paid $amount using PayPal";
    }
}

class PaymentFactory {
    public static function createPaymentGateway($type) {
        if ($type === 'credit_card') {
            return CreditCardPayment::getInstance();
        } elseif ($type === 'paypal') {
            return new PayPalPayment();
        } else {
            throw new Exception("Invalid payment type");
        }
    }
}

// Usage
try {
    $paymentType = 'credit_card'; // Randomly choose 'credit_card' or 'paypal'
    $paymentGateway = PaymentFactory::createPaymentGateway($paymentType);
    $paymentGateway->pay(100);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
```