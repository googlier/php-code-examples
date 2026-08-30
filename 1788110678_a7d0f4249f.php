```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

// Solution:
class Fibonacci {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        }
        return $this->cache[$n];
    }
}

// Usage
$fibonacci = Fibonacci::getInstance();
echo $fibonacci->calculate(10); // Output: 55
?>
```