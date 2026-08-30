```php
<?php

// Problem: Implement a function that takes an array of integers and returns an array of their squares.

// Solution: Using Strategy Design Pattern

interface SquaringStrategy {
    public function square($number);
}

class BasicSquaringStrategy implements SquaringStrategy {
    public function square($number) {
        return $number * $number;
    }
}

class DoubleSquaringStrategy implements SquaringStrategy {
    public function square($number) {
        return 4 * ($number * $number);
    }
}

class SquaringContext {
    private $strategy;

    public function __construct(SquaringStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SquaringStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($number) {
        return $this->strategy->square($number);
    }
}

function squareArray($numbers, $strategyType = 'basic') {
    $strategy = new BasicSquaringStrategy();
    if ($strategyType === 'double') {
        $strategy = new DoubleSquaringStrategy();
    }

    $context = new SquaringContext($strategy);
    $result = array_map([$context, 'executeStrategy'], $numbers);

    return $result;
}

// Test
$numbers = [1, 2, 3, 4, 5];
print_r(squareArray($numbers)); // Basic Squaring
print_r(squareArray($numbers, 'double')); // Double Squaring
?>
```