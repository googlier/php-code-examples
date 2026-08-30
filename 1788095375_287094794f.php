```php
<?php

// Define the interface for a payment gateway
interface PaymentGateway {
    public function processPayment($amount);
}

// Implement the PayPal payment gateway
class PayPalGateway implements PaymentGateway {
    public function processPayment($amount) {
        echo "Processing $amount via PayPal\n";
    }
}

// Implement the Credit Card payment gateway
class CreditCardGateway implements PaymentGateway {
    public function processPayment($amount) {
        echo "Processing $amount via Credit Card\n";
    }
}

// Factory to create payment gateway instances
class PaymentGatewayFactory {
    public static function getGateway($type) {
        switch ($type) {
            case 'paypal':
                return new PayPalGateway();
            case 'credit_card':
                return new CreditCardGateway();
            default:
                throw new Exception("Unknown payment gateway type");
        }
    }
}

// Usage
$gatewayType = rand(1, 2) == 1 ? 'paypal' : 'credit_card';
$gateway = PaymentGatewayFactory::getGateway($gatewayType);
$gateway->processPayment(100);

?>
```