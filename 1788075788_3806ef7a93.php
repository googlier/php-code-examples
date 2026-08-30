```php
<?php
// Problem: Implement a function to calculate the nth Fibonacci number using the Decorator Design Pattern.

// Interface for calculating Fibonacci
interface FibonacciCalculator {
    function calculate($n);
}

// Concrete implementation using recursion
class RecursiveFibonacci implements FibonacciCalculator {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Decorator to add caching to Fibonacci calculations
class CachingFibonacciDecorator implements FibonacciCalculator {
    private $fibonacci;
    private $cache = [];

    public function __construct(FibonacciCalculator $fibonacci) {
        $this->fibonacci = $fibonacci;
    }

    public function calculate($n) {
        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->fibonacci->calculate($n);
        }
        return $this->cache[$n];
    }
}

// Usage
$fibonacci = new RecursiveFibonacci();
$cachingFibonacci = new CachingFibonacciDecorator($fibonacci);
echo $cachingFibonacci->calculate(10); // Output: 55
?>
```