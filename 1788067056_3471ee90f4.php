```php
<?php

// Problem: Implement a function that calculates the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $fibonacciArray = array(0, 1);

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getNthFibonacci($n) {
        for ($i = 2; $i <= $n; $i++) {
            $this->fibonacciArray[$i] = $this->fibonacciArray[$i - 1] + $this->fibonacciArray[$i - 2];
        }
        return $this->fibonacciArray[$n];
    }
}

// Usage
$n = 10;
$fibonacci = Fibonacci::getInstance();
echo "The $n-th Fibonacci number is: " . $fibonacci->getNthFibonacci($n);
?>
```