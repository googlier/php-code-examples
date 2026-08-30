```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Strategy pattern

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

// Implement the MemoizationStrategy class
class MemoizationStrategy implements FibonacciStrategy {
    private $memo = [];

    public function calculate($n) {
        if (array_key_exists($n, $this->memo)) {
            return $this->memo[$n];
        }
        if ($n <= 1) {
            return $n;
        }
        $this->memo[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        return $this->memo[$n];
    }
}

// Implement the FibonacciContext class
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
$recursiveStrategy = new RecursiveStrategy();
$context = new FibonacciContext($recursiveStrategy);
echo $context->calculate(10); // Output: 55

$memoizationStrategy = new MemoizationStrategy();
$context->setStrategy($memoizationStrategy);
echo $context->calculate(10); // Output: 55
?>
```