```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

class FibonacciSingleton {
    private static $instance = null;
    private $cache = array();

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if (!array_key_exists($n, $this->cache)) {
            if ($n <= 1) {
                $this->cache[$n] = $n;
            } else {
                $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
            }
        }
        return $this->cache[$n];
    }
}

// Usage
$fib = FibonacciSingleton::getInstance();
echo $fib->getFibonacci(10); // Output: 55

?>
```