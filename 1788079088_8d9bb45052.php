```php
<?php

// Random Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

// Random Design Pattern: Singleton

class Fibonacci {
    private static $instance = null;
    private $fibonacciNumbers = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n <= count($this->fibonacciNumbers) - 1) {
            return $this->fibonacciNumbers[$n];
        }

        $this->fibonacciNumbers[] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        return $this->fibonacciNumbers[$n];
    }
}

$n = 10;
$fibonacci = Fibonacci::getInstance();
echo "Fibonacci number at position $n is: " . $fibonacci->getFibonacci($n);

?>
```