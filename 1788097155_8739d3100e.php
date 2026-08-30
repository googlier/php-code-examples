```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern

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

    public function calculate($n) {
        if (!isset($this->fib[$n])) {
            $this->fib[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        }
        return $this->fib[$n];
    }
}

$n = 10;
$fibonacci = Fibonacci::getInstance();
echo "Fibonacci number at position $n is: " . $fibonacci->calculate($n);
?>
```