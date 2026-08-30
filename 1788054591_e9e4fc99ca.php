```php
<?php
// Problem: Implement a function to calculate the Fibonacci sequence up to a given number n using the Strategy design pattern.

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

// Implement the FibonacciContext
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
$n = 10; // Change this value to test with different inputs
$strategy = new RecursiveStrategy(); // Change this to test with different strategies
$context = new FibonacciContext($strategy);
echo "Fibonacci sequence up to $n: " . $context->calculate($n);
?>
```