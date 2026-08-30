```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

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
        while (count($this->fib) <= $n) {
            $this->fib[] = $this->fib[count($this->fib) - 1] + $this->fib[count($this->fib) - 2];
        }
        return $this->fib[$n];
    }
}

$fibonacci = Fibonacci::getInstance();
echo $fibonacci->calculate(10); // Output: 55
?>
```