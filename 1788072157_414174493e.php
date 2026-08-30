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

    public function getNthFibonacci($n) {
        if ($n < count(self::$fibonacci)) {
            return self::$fibonacci[$n];
        }
        while (count(self::$fibonacci) <= $n) {
            $nextValue = self::$fibonacci[count(self::$fibonacci) - 1] + self::$fibonacci[count(self::$fibonacci) - 2];
            self::$fibonacci[] = $nextValue;
        }
        return self::$fibonacci[$n];
    }
}

// Example usage:
$fib = Fibonacci::getInstance();
echo $fib->getNthFibonacci(10); // Output: 55
?>
```