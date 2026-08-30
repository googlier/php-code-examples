```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern

// Solution:
class FibonacciSingleton {
    private static $instance = null;
    private $memo = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
        }
        return $this->memo[$n];
    }
}

// Usage
$n = 10;
$fib = FibonacciSingleton::getInstance()->getFibonacci($n);
echo "The {$n}th Fibonacci number is: {$fib}";
?>
```