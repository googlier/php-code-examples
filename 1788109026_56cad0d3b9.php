```php
<?php
// Problem: Implement a function to calculate the factorial of a number using the Strategy Design Pattern.

// Interface for the Strategy
interface FactorialStrategy {
    public function calculate($n);
}

// Concrete Strategy: Recursive Calculation
class RecursiveFactorial implements FactorialStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return 1;
        }
        return $n * $this->calculate($n - 1);
    }
}

// Concrete Strategy: Iterative Calculation
class IterativeFactorial implements FactorialStrategy {
    public function calculate($n) {
        $result = 1;
        for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

// Context class
class FactorialContext {
    private $strategy;

    public function __construct(FactorialStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(FactorialStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateFactorial($n) {
        return $this->strategy->calculate($n);
    }
}

// Usage
$strategy = new RecursiveFactorial(); // or new IterativeFactorial();
$context = new FactorialContext($strategy);
echo $context->calculateFactorial(5); // Outputs: 120
?>
```