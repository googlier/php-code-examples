```php
<?php

// Random Problem: Implement a function that calculates the nth Fibonacci number using the Decorator Design Pattern

// Define an interface for calculating Fibonacci numbers
interface FibonacciCalculator {
    public function calculate($n);
}

// Implement the basic Fibonacci calculation logic
class BasicFibonacciCalculator implements FibonacciCalculator {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        } else {
            return $this->calculate($n - 1) + $this->calculate($n - 2);
        }
    }
}

// Define a decorator class that adds caching to the Fibonacci calculation
class CachingFibonacciDecorator implements FibonacciCalculator {
    private $calculator;
    private $cache = [];

    public function __construct(FibonacciCalculator $calculator) {
        $this->calculator = $calculator;
    }

    public function calculate($n) {
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        } else {
            $result = $this->calculator->calculate($n);
            $this->cache[$n] = $result;
            return $result;
        }
    }
}

// Usage
$basicCalculator = new BasicFibonacciCalculator();
$cachingCalculator = new CachingFibonacciDecorator($basicCalculator);

$n = 10; // Example input
echo "Fibonacci number at position $n is: " . $cachingCalculator->calculate($n);
?>
```