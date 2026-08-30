```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private static $fibonacci = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if (!isset(self::$fibonacci[$n])) {
            self::$fibonacci[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return self::$fibonacci[$n];
    }
}

// Usage
$fibonacci = Fibonacci::getInstance();
echo $fibonacci->getFibonacci(10); // Output: 55
?>
```