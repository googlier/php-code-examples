```php
<?php

// Problem: Implement a function to calculate the nth Fibonacci number using the Strategy pattern.

interface FibonacciStrategy {
    public function calculate($n);
}

class RecursiveFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

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
$fibonacciContext = new FibonacciContext(new RecursiveFibonacciStrategy());
echo $fibonacciContext->calculate(10); // Output: 55

$fibonacciContext->setStrategy(new IterativeFibonacciStrategy());
echo $fibonacciContext->calculate(10); // Output: 55

?>
```