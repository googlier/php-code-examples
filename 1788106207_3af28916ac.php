```php
<?php
// Problem: Create a function to calculate the nth Fibonacci number using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private $cache = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if (array_key_exists($n, $this->cache)) {
            return $this->cache[$n];
        }

        if ($n <= 1) {
            return $n;
        }

        $this->cache[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        return $this->cache[$n];
    }
}

// Usage
$fibonacci = Fibonacci::getInstance();
echo $fibonacci->getFibonacci(10); // Output: 55
?>
```