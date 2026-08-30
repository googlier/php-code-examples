```php
<?php

// Define a random programming problem
$problem = "Create a function that takes an array of integers and returns the sum of all even numbers in the array.";

// Define a random design pattern
$pattern = "Strategy";

// Implement the solution using the chosen design pattern
interface SumStrategy {
    public function sumEvenNumbers($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function sumEvenNumbers($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->sumEvenNumbers($numbers);
    }
}

// Use the design pattern to solve the problem
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$context = new SumContext($strategy);
$result = $context->executeStrategy($numbers);

echo "Sum of even numbers: " . $result;
?>
```