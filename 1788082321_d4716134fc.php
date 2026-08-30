```php
<?php
// Problem: Implement a function that calculates the nth Fibonacci number using the Singleton design pattern.

// Design Pattern: Singleton

class Fibonacci {
    private static $instance = null;
    private $cache = array();

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if (!isset($this->cache[$n])) {
            if ($n <= 1) {
                $this->cache[$n] = $n;
            } else {
                $this->cache[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
            }
        }
        return $this->cache[$n];
    }
}

// Usage
$fibonacci = Fibonacci::getInstance();
echo $fibonacci->calculate(10);
?>
```