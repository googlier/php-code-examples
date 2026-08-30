```php
<?php
// Define a random programming problem
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

// Solution
class FibonacciSingleton {
    private static $instance = null;
    private $fibonacciNumbers = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function getFibonacciNumber($n) {
        if (isset($this->fibonacciNumbers[$n])) {
            return $this->fibonacciNumbers[$n];
        }

        $this->fibonacciNumbers[$n] = $this->getFibonacciNumber($n - 1) + $this->getFibonacciNumber($n - 2);
        return $this->fibonacciNumbers[$n];
    }
}

// Usage
$fibonacciSingleton = FibonacciSingleton::getInstance();
echo $fibonacciSingleton->getFibonacciNumber(10); // Output: 55
?>
```