```php
<?php
$pattern = array_rand(array(
    'Strategy' => 1,
    'Observer' => 2,
    'Factory' => 3
));

switch ($pattern) {
    case 'Strategy':
        class PaymentStrategy {
            public function pay($amount) {
                echo "Paid with {$this->getPaymentMethod()} amount {$amount}";
            }

            abstract public function getPaymentMethod();
        }

        class CreditCardPayment implements PaymentStrategy {
            public function getPaymentMethod() {
                return "Credit Card";
            }
        }

        class PayPalPayment implements PaymentStrategy {
            public function getPaymentMethod() {
                return "PayPal";
            }
        }

        $payment = new CreditCardPayment();
        $payment->pay(100);

        break;
    case 'Observer':
        class Subject {
            private $observers = [];
            private $state;

            public function attach(Observer $observer) {
                $this->observers[] = $observer;
            }

            public function detach(Observer $observer) {
                foreach ($this->observers as $key => $obs) {
                    if ($obs === $observer) {
                        unset($this->observers[$key]);
                    }
                }
            }

            public function notify() {
                foreach ($this->observers as $observer) {
                    $observer->update($this->state);
                }
            }

            public function setState($state) {
                $this->state = $state;
                $this->notify();
            }
        }

        interface Observer {
            public function update($state);
        }

        class ConcreteObserver implements Observer {
            public function update($state) {
                echo "Observer: Received state update {$state}";
            }
        }

        $subject = new Subject();
        $observer = new ConcreteObserver();
        $subject->attach($observer);
        $subject->setState("Active");

        break;
    case 'Factory':
        interface Shape {
            public function draw();
        }

        class Circle implements Shape {
            public function draw() {
                echo "Drawing Circle";
            }
        }

        class Square implements Shape {
            public function draw() {
                echo "Drawing Square";
            }
        }

        class ShapeFactory {
            public static function getShape($shapeType) {
                if ($shapeType == null) {
                    return null;
                }
                if ($shapeType == "CIRCLE") {
                    return new Circle();
                } else if ($shapeType == "SQUARE") {
                    return new Square();
                }
                return null;
            }
        }

        $shape = ShapeFactory::getShape("CIRCLE");
        $shape->draw();

        break;
}
?>
```