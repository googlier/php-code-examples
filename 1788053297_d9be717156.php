```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Strategy pattern.

// Define the Strategy interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Implement a Recursive Fibonacci strategy
class RecursiveFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Implement a Dynamic Programming Fibonacci strategy
class DPFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        $dp = array_fill(0, $n + 1, 0);
        $dp[1] = 1;
        for ($i = 2; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
        return $dp[$n];
    }
}

// Context class to use the strategy
class FibonacciContext {
    private $strategy;

    public function setStrategy(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($n) {
        return $this->strategy->calculate($n);
    }
}

// Usage
$context = new FibonacciContext();
$context->setStrategy(new DPFibonacciStrategy()); // Change strategy here
echo $context->calculate(10); // Outputs the 10th Fibonacci number
?>
```