```php
<?php

// Problem: Create a function to find the n-th Fibonacci number using the Singleton design pattern.

class FibonacciSingleton {
    private static $instance = null;
    private $fibonacci = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n < count($this->fibonacci)) {
            return $this->fibonacci[$n];
        }
        for ($i = count($this->fibonacci); $i <= $n; $i++) {
            $this->fibonacci[$i] = $this->fibonacci[$i - 1] + $this->fibonacci[$i - 2];
        }
        return $this->fibonacci[$n];
    }
}

$n = 10;
$fibonacci = FibonacciSingleton::getInstance()->getFibonacci($n);
echo "The {$n}-th Fibonacci number is: {$fibonacci}";

?>
```