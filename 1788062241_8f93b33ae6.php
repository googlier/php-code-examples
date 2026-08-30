```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using a Singleton pattern

class FibonacciSingleton {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function fibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
        }
        return $this->cache[$n];
    }
}

// Usage
$fib = FibonacciSingleton::getInstance();
echo $fib->fibonacci(10); // Output: 55
?>
```