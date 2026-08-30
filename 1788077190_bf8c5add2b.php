```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern to ensure only one instance of the Fibonacci calculator exists.

class FibonacciCalculator {
    private static $instance = null;
    private $memo = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new FibonacciCalculator();
        }
        return self::$instance;
    }

    public function fibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
        }
        return $this->memo[$n];
    }
}

// Usage
$calculator = FibonacciCalculator::getInstance();
echo $calculator->fibonacci(10); // Output: 55
?>
```