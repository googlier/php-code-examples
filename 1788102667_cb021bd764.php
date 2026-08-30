```php
<?php

// Problem: Implement a function to find the n-th Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $fibonacci = [];

    private function __construct() {
        $this->fibonacci[0] = 0;
        $this->fibonacci[1] = 1;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getNthFibonacci($n) {
        if (!isset($this->fibonacci[$n])) {
            $this->fibonacci[$n] = $this->getNthFibonacci($n - 1) + $this->getNthFibonacci($n - 2);
        }
        return $this->fibonacci[$n];
    }
}

// Usage
$fib = Fibonacci::getInstance();
echo $fib->getNthFibonacci(10); // Output: 55

?>
```