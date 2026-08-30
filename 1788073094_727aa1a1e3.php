```php
<?php
// Problem: Create a function to calculate the nth Fibonacci number using the Singleton design pattern

class Fibonacci {
    private static $instance = null;
    private $fibonacci = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if ($n < count($this->fibonacci)) {
            return $this->fibonacci[$n];
        }
        while (count($this->fibonacci) <= $n) {
            $this->fibonacci[] = $this->fibonacci[count($this->fibonacci) - 1] + $this->fibonacci[count($this->fibonacci) - 2];
        }
        return $this->fibonacci[$n];
    }
}

// Usage
$fib = Fibonacci::getInstance();
echo $fib->calculate(10); // Output: 55
?>
```