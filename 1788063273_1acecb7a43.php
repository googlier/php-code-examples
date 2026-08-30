```php
<?php
// Problem: Implement a function that calculates the nth Fibonacci number using the Decorator design pattern

// Interface for number calculations
interface NumberCalculator {
    public function calculate($n);
}

// Concrete class for basic Fibonacci calculation
class BasicFibonacci implements NumberCalculator {
    public function calculate($n) {
        if ($n <= 1) return $n;
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Decorator class to add caching to Fibonacci calculation
class CachingFibonacci implements NumberCalculator {
    private $cache = [];
    private $basicFibonacci;

    public function __construct(NumberCalculator $basicFibonacci) {
        $this->basicFibonacci = $basicFibonacci;
    }

    public function calculate($n) {
        if (!isset($this->cache[$n])) {
            $this->cache[$n] = $this->basicFibonacci->calculate($n);
        }
        return $this->cache[$n];
    }
}

// Usage
$basicFib = new BasicFibonacci();
$cachingFib = new CachingFibonacci($basicFib);
echo $cachingFib->calculate(10); // Output: 55
?>
```