```php
<?php
// Generate a random programming problem and solve it using a random design pattern in PHP

// Problem: Implement a function that calculates the sum of the first n Fibonacci numbers using a Singleton design pattern.

// Solution:

class FibonacciSingleton {
    private static $instance = null;
    private $fibonacciNumbers = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getFibonacciNumber($n) {
        if (!isset($this->fibonacciNumbers[$n])) {
            $this->fibonacciNumbers[$n] = $this->getFibonacciNumber($n - 1) + $this->getFibonacciNumber($n - 2);
        }
        return $this->fibonacciNumbers[$n];
    }

    public function sumOfFirstNFibonacci($n) {
        $sum = 0;
        for ($i = 0; $i < $n; $i++) {
            $sum += $this->getFibonacciNumber($i);
        }
        return $sum;
    }
}

$fibonacciSingleton = FibonacciSingleton::getInstance();
$n = 10; // Change this value to calculate the sum of the first n Fibonacci numbers
echo "Sum of the first $n Fibonacci numbers: " . $fibonacciSingleton->sumOfFirstNFibonacci($n);
?>
```