```php
<?php
// Problem: Create a function to calculate the nth Fibonacci number using a Singleton pattern

class Fibonacci {
    private static $instance = null;
    private static $fibonacciArray = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculateFibonacci($n) {
        if (!isset(self::$fibonacciArray[$n])) {
            self::$fibonacciArray[$n] = $this->calculateFibonacci($n - 1) + $this->calculateFibonacci($n - 2);
        }
        return self::$fibonacciArray[$n];
    }
}

// Usage
$fib = Fibonacci::getInstance();
echo $fib->calculateFibonacci(10);
?>
```