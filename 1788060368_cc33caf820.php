```php
<?php
// Problem: Generate a function that finds the nth Fibonacci number using the Strategy design pattern.

interface FibonacciStrategy {
    public function calculate($n);
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

class RecursiveFibonacciStrategy implements FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
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
$fibonacci = new FibonacciContext(new IterativeFibonacciStrategy());
echo "5th Fibonacci number (Iterative): " . $fibonacci->calculate(5) . "\n";

$fibonacci->setStrategy(new RecursiveFibonacciStrategy());
echo "5th Fibonacci number (Recursive): " . $fibonacci->calculate(5) . "\n";
?>
```