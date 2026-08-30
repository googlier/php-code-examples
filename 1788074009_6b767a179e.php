```php
<?php

// Problem: Implement a function to calculate the factorial of a number using the Strategy design pattern.

// Define the Strategy interface
interface FactorialStrategy {
    public function calculate($number);
}

// Implement the Recursive strategy
class RecursiveStrategy implements FactorialStrategy {
    public function calculate($number) {
        if ($number <= 1) return 1;
        return $number * $this->calculate($number - 1);
    }
}

// Implement the Iterative strategy
class IterativeStrategy implements FactorialStrategy {
    public function calculate($number) {
        $result = 1;
        for ($i = 2; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

// Context class to use the strategy
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
$context = new FactorialContext(new RecursiveStrategy());
echo "Recursive Factorial of 5: " . $context->calculate(5) . "\n";

$context->setStrategy(new IterativeStrategy());
echo "Iterative Factorial of 5: " . $context->calculate(5) . "\n";

?>
```