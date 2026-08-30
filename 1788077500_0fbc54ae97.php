```php
<?php
// Generate a random programming problem and solve it using a random design pattern

// Problem: Implement a function that calculates the nth Fibonacci number using the Singleton design pattern.

class FibonacciSingleton {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        }
        $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        return $this->cache[$n];
    }
}

$singleton = FibonacciSingleton::getInstance();
$n = 10; // Example input
echo $singleton->getFibonacci($n); // Output the nth Fibonacci number
?>
```