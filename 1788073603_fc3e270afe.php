```php
<?php

// Problem: Implement a function that calculates the nth Fibonacci number using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private $fibonacci = [0, 1];

    private function __construct() {}

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

$n = 10;
$fib = Fibonacci::getInstance()->getNthFibonacci($n);
echo "The {$n}th Fibonacci number is: {$fib}";

?>
```