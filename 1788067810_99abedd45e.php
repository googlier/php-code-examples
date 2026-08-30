```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Strategy pattern.

// Define the Strategy interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Implement a recursive strategy
class RecursiveFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        } else {
            return $this->calculate($n - 1) + $this->calculate($n - 2);
        }
    }
}

// Implement an iterative strategy
class IterativeFibonacciStrategy implements FibonacciStrategy {
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
$fibContext = new FibonacciContext(new RecursiveFibonacciStrategy());
echo "Recursive Fibonacci(10): " . $fibContext->calculate(10) . "\n";

$fibContext->setStrategy(new IterativeFibonacciStrategy());
echo "Iterative Fibonacci(10): " . $fibContext->calculate(10) . "\n";
?>
```