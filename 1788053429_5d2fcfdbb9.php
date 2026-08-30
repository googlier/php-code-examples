```php
<?php
// Problem: Implement a function that calculates the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $fibCache = array(0 => 0, 1 => 1);

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if (!isset($this->fibCache[$n])) {
            $this->fibCache[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        }
        return $this->fibCache[$n];
    }
}

$n = 10;
$fib = Fibonacci::getInstance()->calculate($n);
echo "The {$n}th Fibonacci number is: {$fib}";
?>
```