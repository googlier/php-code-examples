```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using a Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $fib = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n < count($this->fib)) {
            return $this->fib[$n];
        }
        for ($i = count($this->fib); $i <= $n; $i++) {
            $this->fib[$i] = $this->fib[$i - 1] + $this->fib[$i - 2];
        }
        return $this->fib[$n];
    }
}

// Usage
$fib = Fibonacci::getInstance();
echo $fib->getFibonacci(10); // Output: 55
?>
```