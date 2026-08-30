```php
<?php
// Problem: Create a function to calculate the nth Fibonacci number using the Decorator design pattern

// Interface for Fibonacci calculation
interface FibonacciCalculator {
    function calculate($n);
}

// Concrete implementation of Fibonacci calculation
class BasicFibonacciCalculator implements FibonacciCalculator {
    public function calculate($n) {
        if($n <= 1) return $n;
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Decorator class to add caching functionality
class CachedFibonacciCalculator implements FibonacciCalculator {
    private $fibonacciCalculator;
    private $cache;

    public function __construct(FibonacciCalculator $fibonacciCalculator) {
        $this->fibonacciCalculator = $fibonacciCalculator;
        $this->cache = [];
    }

    public function calculate($n) {
        if(isset($this->cache[$n])) return $this->cache[$n];
        $result = $this->fibonacciCalculator->calculate($n);
        $this->cache[$n] = $result;
        return $result;
    }
}

// Usage
$fibonacci = new CachedFibonacciCalculator(new BasicFibonacciCalculator());
echo $fibonacci->calculate(10); // Output: 55
?>
```