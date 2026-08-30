```php
<?php

interface PaymentStrategy {
    public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy {
    public function pay($amount) {
        return "Paid " . $amount . " using Credit Card";
    }
}

class PayPalPayment implements PaymentStrategy {
    public function pay($amount) {
        return "Paid " . $amount . " using PayPal";
    }
}

class ShoppingCart {
    private $paymentStrategy;
    private $items = [];

    public function setPaymentStrategy(PaymentStrategy $strategy) {
        $this->paymentStrategy = $strategy;
    }

    public function addItem($item, $price) {
        $this->items[] = ['item' => $item, 'price' => $price];
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'];
        }
        return $total;
    }

    public function checkout() {
        return $this->paymentStrategy->pay($this->getTotal());
    }
}

$cart = new ShoppingCart();
$cart->addItem("Book", 10);
$cart->addItem("Pen", 2);
$cart->setPaymentStrategy(new CreditCardPayment());
echo $cart->checkout();
?>
```