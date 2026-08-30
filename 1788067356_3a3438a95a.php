```php
<?php

// Problem: Implement a function to find the nth Fibonacci number using a decorator pattern.

// Design Pattern: Decorator Pattern

// Interface
interface FibonacciInterface {
    public function getFibonacci($n);
}

// Concrete Component
class FibonacciCalculator implements FibonacciInterface {
    public function getFibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->getFibonacci($n - 1) + $this->getFibonacci($n - 2);
    }
}

// Decorator
class FibonacciDecorator implements FibonacciInterface {
    protected $fibonacciCalculator;

    public function __construct(FibonacciInterface $fibonacciCalculator) {
        $this->fibonacciCalculator = $fibonacciCalculator;
    }

    public function getFibonacci($n) {
        return $this->fibonacciCalculator->getFibonacci($n);
    }
}

// Usage
$fibonacci = new FibonacciDecorator(new FibonacciCalculator());
echo $fibonacci->getFibonacci(10); // Output: 55
?>
```