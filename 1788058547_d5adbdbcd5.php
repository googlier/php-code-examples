```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

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

    public function getFibonacciNumber($n) {
        if (!isset($this->fibonacci[$n])) {
            $this->fibonacci[$n] = $this->getFibonacciNumber($n - 1) + $this->getFibonacciNumber($n - 2);
        }
        return $this->fibonacci[$n];
    }
}

$n = 10;
$fibonacci = Fibonacci::getInstance();
echo "The {$n}th Fibonacci number is: " . $fibonacci->getFibonacciNumber($n);

?>
```