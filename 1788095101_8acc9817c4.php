```php
<?php

// Problem: Generate a function that takes an array of integers and returns an array of their square roots.
// Use the Strategy design pattern to implement different square root calculation strategies.

// Strategy Interface
interface SquareRootStrategy {
    public function calculate($number);
}

// Concrete Strategy 1: Using built-in PHP function
class BuiltInSqrtStrategy implements SquareRootStrategy {
    public function calculate($number) {
        return sqrt($number);
    }
}

// Concrete Strategy 2: Using Newton's method
class NewtonSqrtStrategy implements SquareRootStrategy {
    public function calculate($number) {
        $guess = $number / 2.0;
        while (true) {
            $nextGuess = ($guess + $number / $guess) / 2;
            if (abs($guess - $nextGuess) < 0.00001) {
                return $nextGuess;
            }
            $guess = $nextGuess;
        }
    }
}

// Context class
class SquareRootContext {
    private $strategy;

    public function __construct(SquareRootStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SquareRootStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($number) {
        return $this->strategy->calculate($number);
    }
}

// Usage
$numbers = [4, 9, 16, 25, 36];
$context = new SquareRootContext(new BuiltInSqrtStrategy());

foreach ($numbers as $number) {
    echo "Square root of {$number} using built-in function: " . $context->executeStrategy($number) . "<br>";
}

$context->setStrategy(new NewtonSqrtStrategy());

foreach ($numbers as $number) {
    echo "Square root of {$number} using Newton's method: " . $context->executeStrategy($number) . "<br>";
}

?>
```