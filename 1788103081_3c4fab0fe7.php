```php
<?php

// Problem: Implement a function to find the n-th Fibonacci number using the Singleton Design Pattern.

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
        if (!isset($this->cache[$n])) {
            if ($n <= 1) {
                $this->cache[$n] = $n;
            } else {
                $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
            }
        }
        return $this->cache[$n];
    }
}

$n = 10; // Example: Find the 10th Fibonacci number
echo Fibonacci::getInstance()->getFibonacci($n);
?>
```