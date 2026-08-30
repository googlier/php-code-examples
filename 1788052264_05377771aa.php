```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using the Strategy pattern.

// Design Pattern: Strategy

interface FibonacciStrategy {
    public function calculate($n);
}

class RecursiveFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        } else {
            return $this->calculate($n - 1) + $this->calculate($n - 2);
        }
    }
}

class MemoizationFibonacciStrategy implements FibonacciStrategy {
    private $memo = [];

    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->calculate($n - 1) + $this->calculate($n - 2);
        }
        return $this->memo[$n];
    }
}

class FibonacciCalculator {
    private $strategy;

    public function __construct(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function getFibonacci($n) {
        return $this->strategy->calculate($n);
    }
}

// Usage
$fibonacci = new FibonacciCalculator(new MemoizationFibonacciStrategy());
echo $fibonacci->getFibonacci(10); // Output: 55

?>
```