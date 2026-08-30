```php
<?php
// Define a class to represent a Bank Account
class BankAccount {
    private $balance;

    public function __construct($initialBalance = 0) {
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->balance -= $amount;
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

// Define an interface for PaymentStrategy
interface PaymentStrategy {
    public function pay($amount);
}

// Implement PaymentStrategy for Credit Card
class CreditCardPayment implements PaymentStrategy {
    private $cardNumber;

    public function __construct($cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function pay($amount) {
        echo "Paid $amount using Credit Card: " . $this->cardNumber . "<br>";
    }
}

// Implement PaymentStrategy for PayPal
class PayPalPayment implements PaymentStrategy {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function pay($amount) {
        echo "Paid $amount using PayPal: " . $this->email . "<br>";
    }
}

// Use Strategy Pattern to process payments
class ShoppingCart {
    private $items = [];
    private $paymentStrategy;

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function checkout() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'];
        }
        $this->paymentStrategy->pay($total);
    }
}

// Usage
$cart = new ShoppingCart();
$cart->addItem('Laptop', 1200);
$cart->addItem('Mouse', 20);

$creditCard = new CreditCardPayment('1234-5678-9012-3456');
$paypal = new PayPalPayment('user@example.com');

$cart->setPaymentStrategy($creditCard);
$cart->checkout();

$cart->setPaymentStrategy($paypal);
$cart->checkout();
?>
```