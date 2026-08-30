```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Strategy design pattern

// Strategy Interface
interface FibonacciStrategy {
    public function calculate($n);
}

// Concrete Strategy: Recursive
class RecursiveFibonacci implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) return $n;
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Concrete Strategy: Iterative
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

// Context
class Fibonacci {
    private $strategy;

    public function setStrategy(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($n) {
        return $this->strategy->calculate($n);
    }
}

// Usage
$fibonacci = new Fibonacci();
$fibonacci->setStrategy(new RecursiveFibonacci()); // Change strategy to IterativeFibonacci to see the difference
echo $fibonacci->calculate(10); // Output: 55
?>
```