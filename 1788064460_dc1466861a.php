```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Fibonacci();
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
$fib = Fibonacci::getInstance();
echo $fib->fibonacci(10); // Output: 55
?>
```