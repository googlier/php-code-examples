```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern to ensure only one instance is created.

class Fibonacci {
    private static $instance = null;
    private static $cache = [];

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
        if (!isset(self::$cache[$n])) {
            self::$cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return self::$cache[$n];
    }
}

// Usage
$fibonacci = Fibonacci::getInstance();
echo $fibonacci->getFibonacci(10); // Output: 55
?>
```