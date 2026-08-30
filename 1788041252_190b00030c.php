```php
<?php
// Problem: Implement a function to calculate the Fibonacci sequence up to a given number using the Strategy design pattern.

// Strategy Interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Concrete Strategy: Recursive Approach
class RecursiveFibonacci implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) return $n;
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Concrete Strategy: Iterative Approach
class IterativeFibonacci implements FibonacciStrategy {
    public function calculate($n) {
        $a = 0;
        $b = 1;
        for ($i = 0; $i < $n; $i++) {
            $temp = $a;
            $a = $b;
            $b = $temp + $b;
        }
        return $a;
    }
}

// Context
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
$calculator->setStrategy(new IterativeFibonacci());
echo $calculator->calculate(10); // Output: 55
?>
```