```php
<?php
// Problem: Implement a function to find the nth Fibonacci number using the Decorator Design Pattern

// Interface for Fibonacci number generator
interface FibonacciGenerator {
    public function getNumber($n);
}

// Concrete implementation of Fibonacci number generator
class BaseFibonacciGenerator implements FibonacciGenerator {
    public function getNumber($n) {
        if ($n <= 1) return $n;
        return $this->getNumber($n - 1) + $this->getNumber($n - 2);
    }
}

// Decorator class to add caching functionality to Fibonacci number generator
class CachedFibonacciGenerator implements FibonacciGenerator {
    private $fibonacciGenerator;
    private $cache;

    public function __construct(FibonacciGenerator $fibonacciGenerator) {
        $this->fibonacciGenerator = $fibonacciGenerator;
        $this->cache = [];
    }

    public function getNumber($n) {
        if (isset($this->cache[$n])) return $this->cache[$n];
        $result = $this->fibonacciGenerator->getNumber($n);
        $this->cache[$n] = $result;
        return $result;
    }
}

// Usage
$fibonacciGenerator = new CachedFibonacciGenerator(new BaseFibonacciGenerator());
echo $fibonacciGenerator->getNumber(10); // Output: 55
?>
```