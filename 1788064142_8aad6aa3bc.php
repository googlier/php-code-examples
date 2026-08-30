```php
<?php
// Random Programming Problem: Create a function to calculate the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $fibonacci = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if (isset($this->fibonacci[$n])) {
            return $this->fibonacci[$n];
        }
        $this->fibonacci[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        return $this->fibonacci[$n];
    }
}

// Usage
$fib = Fibonacci::getInstance();
echo $fib->calculate(10);
?>
```