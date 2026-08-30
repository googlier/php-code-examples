```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Singleton design pattern.

// Singleton Design Pattern
class Fibonacci {
    private static $instance = null;
    private $memo = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
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
$n = 10;
$fib = Fibonacci::getInstance()->fibonacci($n);
echo "The $n-th Fibonacci number is: $fib";
?>
```