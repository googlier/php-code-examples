```php
<?php

// Problem: Implement a function to find the n-th Fibonacci number using the Singleton design pattern.

// Design Pattern: Singleton

class Fibonacci {
    private static $instance = null;
    private $memo = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return $this->memo[$n];
    }
}

// Usage
$n = 10; // Replace with the desired Fibonacci number
echo "The " . $n . "th Fibonacci number is: " . Fibonacci::getInstance()->getFibonacci($n);

?>
```