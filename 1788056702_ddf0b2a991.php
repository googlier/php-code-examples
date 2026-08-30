```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using a Singleton design pattern.

class Fibonacci {
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
        if ($n <= 0) return 0;
        if ($n == 1) return 1;

        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }

        return $this->cache[$n];
    }
}

// Usage
$fib = Fibonacci::getInstance();
echo $fib->getFibonacci(10); // Output: 55

?>
```