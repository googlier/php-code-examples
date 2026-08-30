```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Strategy Design Pattern.

// Define the Strategy interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Implement a concrete strategy using iteration
class IterativeFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        $a = 0;
        $b = 1;
        for ($i = 2; $i <= $n; $i++) {
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
        return $b;
    }
}

// Implement a concrete strategy using recursion
class RecursiveFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Context class to use the strategy
class FibonacciCalculator {
    private $strategy;

    public function setStrategy(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($n) {
        return $this->strategy->calculate($n);
    }
}

// Usage
$calculator = new FibonacciCalculator();
$calculator->setStrategy(new IterativeFibonacciStrategy());
echo $calculator->calculate(10); // Output: 55

$calculator->setStrategy(new RecursiveFibonacciStrategy());
echo $calculator->calculate(10); // Output: 55
?>
```