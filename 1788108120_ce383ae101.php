```php
<?php
// Problem: Implement a function that calculates the nth Fibonacci number using the Singleton design pattern.

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

    public function getFibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return $this->cache[$n];
    }
}

// Usage
$fibonacci = Fibonacci::getInstance();
echo $fibonacci->getFibonacci(10); // Output: 55
?>
```