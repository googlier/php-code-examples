```php
<?php

// Problem: Generate a function that takes an array of integers and returns a new array with each element decremented by 2.

// Design Pattern: Strategy

interface DecrementStrategy {
    public function decrement(int $number): int;
}

class SubtractTwoStrategy implements DecrementStrategy {
    public function decrement(int $number): int {
        return $number - 2;
    }
}

class DecrementArray {
    private $strategy;

    public function __construct(DecrementStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function decrementArray(array $numbers): array {
        $result = [];
        foreach ($numbers as $number) {
            $result[] = $this->strategy->decrement($number);
        }
        return $result;
    }
}

$numbers = [5, 7, 9, 11];
$strategy = new SubtractTwoStrategy();
$decrementArray = new DecrementArray($strategy);
$decrementedNumbers = $decrementArray->decrementArray($numbers);

print_r($decrementedNumbers); // Output: Array ( [0] => 3 [1] => 5 [2] => 7 [3] => 9 )

?>
```