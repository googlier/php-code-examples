```php
<?php

// Generate a random programming problem
$problem = rand(1, 3);

switch ($problem) {
    case 1:
        // Problem: Implement a Singleton pattern to create a class that can only be instantiated once
        echo "Singleton Pattern Implementation:\n";
        class Singleton {
            private static $instance = null;
            private function __construct() {}
            public static function getInstance() {
                if (self::$instance == null) {
                    self::$instance = new Singleton();
                }
                return self::$instance;
            }
        }

        $instance1 = Singleton::getInstance();
        $instance2 = Singleton::getInstance();

        var_dump($instance1 === $instance2); // Should return true
        break;

    case 2:
        // Problem: Implement a Factory pattern to create objects based on a type
        echo "Factory Pattern Implementation:\n";
        interface Shape {
            public function draw();
        }

        class Circle implements Shape {
            public function draw() {
                echo "Drawing a circle\n";
            }
        }

        class Square implements Shape {
            public function draw() {
                echo "Drawing a square\n";
            }
        }

        class ShapeFactory {
            public static function getShape($shapeType) {
                if ($shapeType == null) {
                    return null;
                }
                if ($shapeType == "circle") {
                    return new Circle();
                } else if ($shapeType == "square") {
                    return new Square();
                }
                return null;
            }
        }

        $shape1 = ShapeFactory::getShape("circle");
        $shape1->draw();

        $shape2 = ShapeFactory::getShape("square");
        $shape2->draw();
        break;

    case 3:
        // Problem: Implement a Strategy pattern to change algorithms at runtime
        echo "Strategy Pattern Implementation:\n";
        interface PaymentStrategy {
            public function pay($amount);
        }

        class CreditCardPayment implements PaymentStrategy {
            public function pay($amount) {
                echo "Paid with Credit Card: $" . $amount . "\n";
            }
        }

        class PayPalPayment implements PaymentStrategy {
            public function pay($amount) {
                echo "Paid with PayPal: $" . $amount . "\n";
            }
        }

        class ShoppingCart {
            private $paymentStrategy;
            public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
                $this->paymentStrategy = $paymentStrategy;
            }
            public function checkout($amount) {
                $this->paymentStrategy->pay($amount);
            }
        }

        $cart = new ShoppingCart();
        $cart->setPaymentStrategy(new CreditCardPayment());
        $cart->checkout(100);

        $cart->setPaymentStrategy(new PayPalPayment());
        $cart->checkout(200);
        break;
}
?>
```