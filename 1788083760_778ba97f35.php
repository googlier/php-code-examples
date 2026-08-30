```php
<?php
// Generate a random programming problem and solve it using a random design pattern

// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

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

    public function getNumber($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->getNumber($n - 1) + $this->getNumber($n - 2);
        }
        return $this->cache[$n];
    }
}

// Usage
$n = 10;
$fib = Fibonacci::getInstance();
echo "The {$n}th Fibonacci number is: " . $fib->getNumber($n);
?>
```