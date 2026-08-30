```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Strategy Design Pattern.

// Define the Strategy interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Implement the Recursive Fibonacci strategy
class RecursiveFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Implement the Iterative Fibonacci strategy
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

    public function setStrategy(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($n) {
        return $this->strategy->calculate($n);
    }
}

// Usage
$context = new FibonacciContext();
$context->setStrategy(new RecursiveFibonacciStrategy());
echo "Recursive Fibonacci (5): " . $context->calculate(5) . "\n";

$context->setStrategy(new IterativeFibonacciStrategy());
echo "Iterative Fibonacci (5): " . $context->calculate(5) . "\n";
?>
```