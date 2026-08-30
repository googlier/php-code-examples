```php
<?php
// Problem: Implement a function that returns the nth Fibonacci number using a Singleton design pattern

class FibonacciSingleton {
    private static $instance;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return $this->cache[$n];
    }
}

// Usage
$fibonacciSingleton = FibonacciSingleton::getInstance();
echo $fibonacciSingleton->getFibonacci(10); // Output: 55
?>
```