```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

class Fibonacci {
    private static $instance = null;
    private $fibonacci = array(0, 1);

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Fibonacci();
        }
        return self::$instance;
    }

    public function getNumber($n) {
        if (!isset($this->fibonacci[$n])) {
            $this->fibonacci[$n] = $this->getNumber($n - 1) + $this->getNumber($n - 2);
        }
        return $this->fibonacci[$n];
    }
}

$n = 10;
$fib = Fibonacci::getInstance();
echo "The {$n}th Fibonacci number is: " . $fib->getNumber($n);
?>
```