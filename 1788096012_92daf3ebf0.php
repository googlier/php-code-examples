```php
<?php
// Generate a random programming problem and solve it using a random design pattern

// Problem: Implement a function to calculate the nth Fibonacci number using the Decorator design pattern.

// Design Pattern: Decorator

// Decorator interface
interface FibonacciDecorator {
    public function calculate($n);
}

// Concrete Decorator
class MemoizationDecorator implements FibonacciDecorator {
    private $cache = [];
    private $decorated;

    public function __construct(FibonacciDecorator $decorated) {
        $this->decorated = $decorated;
    }

    public function calculate($n) {
        if (isset($this->cache[$n])) {
            return $this->cache[$n];
        }
        $result = $this->decorated->calculate($n);
        $this->cache[$n] = $result;
        return $result;
    }
}

// Concrete Component
class BaseFibonacci implements FibonacciDecorator {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Usage
$baseFib = new BaseFibonacci();
$decoratedFib = new MemoizationDecorator($baseFib);

$n = 10; // Calculate the 10th Fibonacci number
echo $decoratedFib->calculate($n);
?>
```