```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Strategy Design Pattern

// Define the Strategy interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Implement the RecursiveStrategy
class RecursiveStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Implement the IterativeStrategy
class IterativeStrategy implements FibonacciStrategy {
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

// Implement the Context class
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
$strategy = new IterativeStrategy();
$context = new FibonacciContext($strategy);
echo $context->calculate(10); // Output: 55
?>
```