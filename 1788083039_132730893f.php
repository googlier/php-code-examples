```php
<?php

// Problem: Implement a function that returns the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        }
        if ($n <= 1) {
            return $n;
        }
        $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        return $this->cache[$n];
    }
}

$fib = Fibonacci::getInstance();
echo $fib->getFibonacci(10);

?>
```