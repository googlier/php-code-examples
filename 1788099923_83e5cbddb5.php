```php
<?php

// Define a problem: Implement a system that can handle different types of payment methods (e.g., CreditCard, PayPal, BankTransfer) without modifying the existing payment processing logic.

// Define an interface for payment methods
interface PaymentMethod {
    public function pay($amount);
}

// Implement CreditCard payment method
class CreditCard implements PaymentMethod {
    public function pay($amount) {
        echo "Paid $amount using Credit Card.";
    }
}

// Implement PayPal payment method
class PayPal implements PaymentMethod {
    public function pay($amount) {
        echo "Paid $amount using PayPal.";
    }
}

// Implement BankTransfer payment method
class BankTransfer implements PaymentMethod {
    public function pay($amount) {
        echo "Paid $amount using Bank Transfer.";
    }
}

// Use Factory pattern to create payment method instances
class PaymentMethodFactory {
    public static function createPaymentMethod($type) {
        switch ($type) {
            case 'CreditCard':
                return new CreditCard();
            case 'PayPal':
                return new PayPal();
            case 'BankTransfer':
                return new BankTransfer();
            default:
                throw new Exception("Unknown payment method type.");
        }
    }
}

// Usage
$paymentType = 'CreditCard'; // Can be 'PayPal' or 'BankTransfer'
$paymentMethod = PaymentMethodFactory::createPaymentMethod($paymentType);
$paymentMethod->pay(100.00);

?>
```