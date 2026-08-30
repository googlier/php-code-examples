```php
<?php

// Define a Random Problem: Implement a function to calculate the factorial of a given number using the Strategy Design Pattern

// Define the Strategy interface
interface FactorialStrategy {
    public function calculate($number);
}

// Implement the RecursiveStrategy
class RecursiveStrategy implements FactorialStrategy {
    public function calculate($number) {
        if ($number <= 1) {
            return 1;
        }
        return $number * $this->calculate($number - 1);
    }
}

// Implement the IterativeStrategy
class IterativeStrategy implements FactorialStrategy {
    public function calculate($number) {
        $result = 1;
        for ($i = 2; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

// Implement the Context class
class Context {
    private $strategy;

    public function __construct(FactorialStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(FactorialStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateFactorial($number) {
        return $this->strategy->calculate($number);
    }
}

// Usage
$strategy = new RecursiveStrategy();
$context = new Context($strategy);
echo "Factorial using Recursive Strategy: " . $context->calculateFactorial(5) . "\n";

$strategy = new IterativeStrategy();
$context->setStrategy($strategy);
echo "Factorial using Iterative Strategy: " . $context->calculateFactorial(5) . "\n";

?>
```