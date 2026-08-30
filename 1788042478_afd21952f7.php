```php
<?php
// Problem: Implement a function to calculate the Fibonacci sequence up to a given number n using the Strategy design pattern.

// Define the Strategy interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Implement the RecursiveStrategy class
class RecursiveStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Implement the IterativeStrategy class
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
$n = 10;
$context = new FibonacciContext(new RecursiveStrategy());
echo "Recursive: " . $context->calculate($n) . "\n";

$context->setStrategy(new IterativeStrategy());
echo "Iterative: " . $context->calculate($n) . "\n";
?>
```