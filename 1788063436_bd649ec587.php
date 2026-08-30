```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $fib = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if (!isset($this->fib[$n])) {
            $this->fib[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return $this->fib[$n];
    }
}

$fib = Fibonacci::getInstance();
echo $fib->getFibonacci(10); // Output: 55
?>
```