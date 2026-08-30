```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using a Singleton design pattern.

// Design Pattern: Singleton

class Fibonacci {
    private static $instance = null;
    private $fibonacciArray = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if (array_key_exists($n, $this->fibonacciArray)) {
            return $this->fibonacciArray[$n];
        }
        $this->fibonacciArray[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        return $this->fibonacciArray[$n];
    }
}

// Usage
$fibonacci = Fibonacci::getInstance();
echo $fibonacci->calculate(10); // Output: 55
?>
```