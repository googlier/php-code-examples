```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Flyweight design pattern.

// Design Pattern: Flyweight

// Class to represent a Fibonacci number
class FibonacciFlyweight {
    private $fibonacciMap;

    public function __construct() {
        $this->fibonacciMap = [0 => 0, 1 => 1];
    }

    public function getFibonacci($n) {
        if (!isset($this->fibonacciMap[$n])) {
            $this->fibonacciMap[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return $this->fibonacciMap[$n];
    }
}

// Flyweight factory
class FibonacciFlyweightFactory {
    private static $factory;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$factory)) {
            self::$factory = new self();
        }
        return self::$factory;
    }

    public function getFibonacciFlyweight() {
        return new FibonacciFlyweight();
    }
}

// Usage
$n = 10;
$fibFlyweightFactory = FibonacciFlyweightFactory::getInstance();
$fibFlyweight = $fibFlyweightFactory->getFibonacciFlyweight();
echo "Fibonacci number at position $n is " . $fibFlyweight->getFibonacci($n);
?>
```