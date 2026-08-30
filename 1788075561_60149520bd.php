```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private static $memo = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset(self::$memo[$n])) {
            self::$memo[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        }
        return self::$memo[$n];
    }
}

// Usage
$fib = Fibonacci::getInstance();
echo $fib->calculate(10); // Output: 55
?>
```