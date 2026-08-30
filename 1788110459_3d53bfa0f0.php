```php
<?php

// Problem: Implement a function to calculate the Fibonacci sequence up to a given number n using the Singleton design pattern.

// Solution: Using the Singleton design pattern to ensure that only one instance of the FibonacciCalculator is created.

class FibonacciCalculator {
    private static $instance;
    private $fibonacci = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new FibonacciCalculator();
        }
        return self::$instance;
    }

    public function calculate($n) {
        for ($i = 2; $i <= $n; $i++) {
            $this->fibonacci[$i] = $this->fibonacci[$i - 1] + $this->fibonacci[$i - 2];
        }
        return $this->fibonacci[$n];
    }
}

// Usage
$n = 10;
$calculator = FibonacciCalculator::getInstance();
echo "Fibonacci number at position $n is: " . $calculator->calculate($n);
?>
```