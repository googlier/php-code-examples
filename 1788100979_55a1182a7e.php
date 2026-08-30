```php
<?php
$pattern = 'Strategy';
$problem = 'Create a program that calculates the total cost of an order. The cost should be calculated differently based on the payment method used. For example, if the payment method is "Credit Card", a 2% service charge should be added. If the payment method is "PayPal", a 1% service charge should be added. If the payment method is "Cash", no service charge should be added.';

// Strategy Interface
interface PaymentStrategy {
    public function pay($amount);
}

// Concrete Strategy for Credit Card
class CreditCardStrategy implements PaymentStrategy {
    public function pay($amount) {
        return $amount + ($amount * 0.02);
    }
}

// Concrete Strategy for PayPal
class PayPalStrategy implements PaymentStrategy {
    public function pay($amount) {
        return $amount + ($amount * 0.01);
    }
}

// Concrete Strategy for Cash
class CashStrategy implements PaymentStrategy {
    public function pay($amount) {
        return $amount;
    }
}

// Context
class Order {
    private $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function calculateTotalCost($amount) {
        return $this->paymentStrategy->pay($amount);
    }
}

// Usage
$order = new Order();
$order->setPaymentStrategy(new CreditCardStrategy());
$totalCost = $order->calculateTotalCost(100);
echo "Total Cost with Credit Card: " . $totalCost . "\n";

$order->setPaymentStrategy(new PayPalStrategy());
$totalCost = $order->calculateTotalCost(100);
echo "Total Cost with PayPal: " . $totalCost . "\n";

$order->setPaymentStrategy(new CashStrategy());
$totalCost = $order->calculateTotalCost(100);
echo "Total Cost with Cash: " . $totalCost . "\n";
?>
```