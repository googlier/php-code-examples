```php
<?php
// Problem: Create a function that generates a Fibonacci sequence up to n numbers using the Strategy pattern.

interface FibonacciStrategy {
    public function generate($n);
}

class IterativeFibonacci implements FibonacciStrategy {
    public function generate($n) {
        $fibonacci = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }
        return $fibonacci;
    }
}

class RecursiveFibonacci implements FibonacciStrategy {
    public function generate($n) {
        if ($n <= 1) {
            return [$n];
        }
        $previous = $this->generate($n - 1);
        $previous[] = $previous[$n - 2] + $previous[$n - 1];
        return $previous;
    }
}

class FibonacciContext {
    private $strategy;

    public function setStrategy(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function generate($n) {
        return $this->strategy->generate($n);
    }
}

// Usage
$fibonacciContext = new FibonacciContext();
$fibonacciContext->setStrategy(new IterativeFibonacci());
echo json_encode($fibonacciContext->generate(10)); // Output: [0,1,1,2,3,5,8,13,21,34]

$fibonacciContext->setStrategy(new RecursiveFibonacci());
echo json_encode($fibonacciContext->generate(10)); // Output: [0,1,1,2,3,5,8,13,21,34]
?>
```