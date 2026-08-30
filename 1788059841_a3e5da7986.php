```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Singleton design pattern.

class FibonacciSingleton {
    private static $instance = null;
    private $fibonacciArray = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new FibonacciSingleton();
        }
        return self::$instance;
    }

    public function getFibonacci($n) {
        if (isset($this->fibonacciArray[$n])) {
            return $this->fibonacciArray[$n];
        } else {
            $this->fibonacciArray[$n] = $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
            return $this->fibonacciArray[$n];
        }
    }
}

$n = 10; // Example input
$fibonacci = FibonacciSingleton::getInstance()->getFibonacci($n);
echo "The $n-th Fibonacci number is: $fibonacci";
?>
```