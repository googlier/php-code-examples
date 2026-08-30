```php
<?php

// Problem: Implement a function to calculate the factorial of a number using the Strategy Design Pattern.

// Strategy Interface
interface FactorialStrategy {
    public function calculate($number);
}

// Concrete Strategy: Recursive Factorial
class RecursiveFactorial implements FactorialStrategy {
    public function calculate($number) {
        if ($number <= 1) {
            return 1;
        }
        return $number * $this->calculate($number - 1);
    }
}

// Concrete Strategy: Iterative Factorial
class IterativeFactorial implements FactorialStrategy {
    public function calculate($number) {
        $result = 1;
        for ($i = 1; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

// Context
class FactorialContext {
    private $strategy;

    public function setStrategy(FactorialStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateFactorial($number) {
        return $this->strategy->calculate($number);
    }
}

// Usage
$context = new FactorialContext();
$context->setStrategy(new RecursiveFactorial()); // You can switch between strategies
echo $context->calculateFactorial(5); // Output: 120
?>
```