```php
<?php

// Define a random problem: 
// Create a function that calculates the nth Fibonacci number using a design pattern.

// Define a random design pattern: 
// Strategy Pattern

// Define a context class
class FibonacciContext {
    private $strategy;

    public function __construct(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($n) {
        return $this->strategy->execute($n);
    }
}

// Define a strategy interface
interface FibonacciStrategy {
    public function execute($n);
}

// Define concrete strategies
class RecursiveFibonacciStrategy implements FibonacciStrategy {
    public function execute($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->execute($n - 1) + $this->execute($n - 2);
    }
}

class IterativeFibonacciStrategy implements FibonacciStrategy {
    public function execute($n) {
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

// Usage
$n = 10;
$context = new FibonacciContext(new IterativeFibonacciStrategy());
echo $context->calculate($n); // Output the nth Fibonacci number

?>
```