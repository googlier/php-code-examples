```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

// Solution:
class FibonacciSingleton {
    private static $instance = null;
    private $fibonacci = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if (array_key_exists($n, $this->fibonacci)) {
            return $this->fibonacci[$n];
        }

        $this->fibonacci[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        return $this->fibonacci[$n];
    }
}

// Usage
$fib = FibonacciSingleton::getInstance();
echo $fib->getFibonacci(10); // Output: 55
?>
```