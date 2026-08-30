```php
<?php
// Define a class to represent a bank account
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

// Define an interface for payment strategies
interface PaymentStrategy {
    public function pay($amount);
}

// Define a concrete payment strategy for credit card payments
class CreditCardPayment implements PaymentStrategy {
    private $cardNumber;
    private $expiryDate;
    private $cvv;

    public function __construct($cardNumber, $expiryDate, $cvv) {
        $this->cardNumber = $cardNumber;
        $this->expiryDate = $expiryDate;
        $this->cvv = $cvv;
    }

    public function pay($amount) {
        // Simulate a payment process
        echo "Paid with credit card: $amount\n";
    }
}

// Define a context class for handling payments
class PaymentContext {
    private $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategy $strategy) {
        $this->paymentStrategy = $strategy;
    }

    public function executePayment($amount) {
        $this->paymentStrategy->pay($amount);
    }
}

// Usage
$account = new BankAccount(100);
$paymentStrategy = new CreditCardPayment("1234-5678-9012-3456", "12/25", "123");
$paymentContext = new PaymentContext();
$paymentContext->setPaymentStrategy($paymentStrategy);
$paymentContext->executePayment(50);
echo "New Balance: " . $account->getBalance() . "\n";
?>
```