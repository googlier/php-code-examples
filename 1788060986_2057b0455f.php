```php
<?php
// Problem: Implement a function that calculates the factorial of a given non-negative integer using the Strategy design pattern.

// Interface for the strategy
interface FactorialStrategy {
    public function calculate($number);
}

// Concrete strategy for recursive calculation
class RecursiveFactorialStrategy implements FactorialStrategy {
    public function calculate($number) {
        if ($number <= 1) {
            return 1;
        } else {
            return $number * $this->calculate($number - 1);
        }
    }
}

// Concrete strategy for iterative calculation
class IterativeFactorialStrategy implements FactorialStrategy {
    public function calculate($number) {
        $result = 1;
        for ($i = 1; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

// Context class using the strategy
class FactorialContext {
    private $strategy;

    public function __construct(FactorialStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(FactorialStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($number) {
        return $this->strategy->calculate($number);
    }
}

// Usage
$number = 5;
$context = new FactorialContext(new RecursiveFactorialStrategy());
echo "Factorial of $number using RecursiveStrategy: " . $context->calculate($number) . "\n";

$context->setStrategy(new IterativeFactorialStrategy());
echo "Factorial of $number using IterativeStrategy: " . $context->calculate($number) . "\n";
?>
```