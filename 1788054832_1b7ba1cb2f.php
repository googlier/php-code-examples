```php
<?php
// Problem: Implement a shopping cart system that allows adding, removing, and calculating the total price of items. Each item has a name, price, and quantity.

// Design Pattern: Strategy

class Item {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getTotalPrice() {
        return $this->price * $this->quantity;
    }
}

interface PaymentStrategy {
    public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy {
    public function pay($amount) {
        echo "Paid with Credit Card: $" . $amount;
    }
}

class PayPalPayment implements PaymentStrategy {
    public function pay($amount) {
        echo "Paid with PayPal: $" . $amount;
    }
}

class ShoppingCart {
    private $items = [];
    private $paymentStrategy;

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function removeItem(Item $item) {
        $key = array_search($item, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
        }
    }

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotalPrice();
        }
        return $total;
    }

    public function checkout() {
        $total = $this->getTotal();
        if ($this->paymentStrategy) {
            $this->paymentStrategy->pay($total);
        } else {
            echo "No payment method set.";
        }
    }
}

// Usage
$item1 = new Item("Laptop", 999.99, 1);
$item2 = new Item("Mouse", 25.99, 2);

$cart = new ShoppingCart();
$cart->addItem($item1);
$cart->addItem($item2);

$cart->setPaymentStrategy(new CreditCardPayment());
$cart->checkout();
?>
```