```php
<?php
// Problem: Implement a function that returns the nth Fibonacci number using the Singleton design pattern.

// Solution:
class FibonacciSingleton {
    private static $instance = null;
    private $fibonacciNumbers = array(0, 1);

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function getNthFibonacci($n) {
        for ($i = 2; $i <= $n; $i++) {
            $this->fibonacciNumbers[$i] = $this->fibonacciNumbers[$i - 1] + $this->fibonacciNumbers[$i - 2];
        }
        return $this->fibonacciNumbers[$n];
    }
}

// Usage
$fib = FibonacciSingleton::getInstance();
echo $fib->getNthFibonacci(10); // Output: 55
?>
```