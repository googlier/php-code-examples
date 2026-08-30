```php
<?php

// Problem: Create a function to calculate the sum of the first n numbers in the Fibonacci sequence.

// Design Pattern: Singleton Pattern

class FibonacciCalculator {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new FibonacciCalculator();
        }
        return self::$instance;
    }

    public function sumOfFibonacci($n) {
        if (!isset($this->cache[$n])) {
            if ($n <= 1) {
                $this->cache[$n] = $n;
            } else {
                $this->cache[$n] = $this->sumOfFibonacci($n - 1) + $this->sumOfFibonacci($n - 2);
            }
        }
        return $this->cache[$n];
    }
}

// Usage
$fibCalculator = FibonacciCalculator::getInstance();
echo $fibCalculator->sumOfFibonacci(10); // Output: 88

?>
```