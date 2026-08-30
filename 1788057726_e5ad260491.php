```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

// Design Pattern: Singleton

class FibonacciSingleton {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
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
$n = 10;
$fibSingleton = FibonacciSingleton::getInstance();
echo "Fibonacci number at position $n is: " . $fibSingleton->getFibonacci($n);

?>
```