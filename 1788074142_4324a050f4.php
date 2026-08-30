```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern to ensure that the function is only calculated once for each number.

// Solution:

class FibonacciSingleton {
    private static $instances = [];

    private $fibonacciNumbers;

    private function __construct() {
        $this->fibonacciNumbers = [0, 1];
    }

    public static function getInstance() {
        if (!isset(self::$instances[__CLASS__])) {
            self::$instances[__CLASS__] = new self();
        }
        return self::$instances[__CLASS__];
    }

    public function getFibonacci($n) {
        if (isset($this->fibonacciNumbers[$n])) {
            return $this->fibonacciNumbers[$n];
        }

        $this->fibonacciNumbers[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        return $this->fibonacciNumbers[$n];
    }
}

function calculateFibonacci($n) {
    $singleton = FibonacciSingleton::getInstance();
    return $singleton->getFibonacci($n);
}

// Example usage:
echo calculateFibonacci(10); // Outputs: 55
?>
```