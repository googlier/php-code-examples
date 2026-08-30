```php
<?php
// Problem: Implement a function that calculates the nth Fibonacci number using the Strategy design pattern

// Define the Strategy interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Concrete strategy for iterative calculation
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

// Concrete strategy for recursive calculation
class RecursiveFibonacci implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Context class to use the strategy
class FibonacciContext {
    private $strategy;

    public function __construct(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($n) {
        return $this->strategy->calculate($n);
    }
}

// Usage
$n = 10; // Change this value to test different Fibonacci numbers
$strategy = new IterativeFibonacci(); // Change strategy to RecursiveFibonacci to test the recursive approach
$context = new FibonacciContext($strategy);
echo "Fibonacci number at position $n is " . $context->calculate($n);
?>
```