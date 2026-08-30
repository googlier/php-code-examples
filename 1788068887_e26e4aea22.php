```php
<?php

// Problem: Implement a function to calculate the factorial of a number using the Strategy Design Pattern

// Strategy interface
interface FactorialStrategy {
    public function calculate($number);
}

// Concrete Strategy: Recursive factorial
class RecursiveFactorial implements FactorialStrategy {
    public function calculate($number) {
        if ($number <= 1) {
            return 1;
        } else {
            return $number * $this->calculate($number - 1);
        }
    }
}

// Concrete Strategy: Iterative factorial
class IterativeFactorial implements FactorialStrategy {
    public function calculate($number) {
        $result = 1;
        for ($i = 2; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

// Context
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
$context = new FactorialContext(new RecursiveFactorial());
echo "Factorial using Recursive: " . $context->calculate(5) . "\n";

$context->setStrategy(new IterativeFactorial());
echo "Factorial using Iterative: " . $context->calculate(5) . "\n";

?>
```