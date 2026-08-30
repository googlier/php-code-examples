```php
<?php
// Problem: Create a function that calculates the nth Fibonacci number using the Singleton design pattern to ensure that only one instance of the Fibonacci calculator is created.

// Solution:

class FibonacciCalculator {
    private static $instance = null;
    private $fibArray = [0, 1];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new FibonacciCalculator();
        }
        return self::$instance;
    }

    public function calculate($n) {
        if ($n < 2) {
            return $this->fibArray[$n];
        } else {
            while (count($this->fibArray) <= $n) {
                $this->fibArray[] = $this->fibArray[count($this->fibArray) - 1] + $this->fibArray[count($this->fibArray) - 2];
            }
            return $this->fibArray[$n];
        }
    }
}

$calculator = FibonacciCalculator::getInstance();
echo $calculator->calculate(10); // Output: 55
?>
```