```php
<?php
// Generate a random programming problem
$problem = "Create a function that takes an array of integers and returns the sum of all even numbers in the array.";

// Create a random design pattern
$designPattern = "Strategy";

// Implement the solution using the selected design pattern
class SumEvenNumbers {
    protected $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function execute($numbers) {
        return $this->strategy->sumEven($numbers);
    }
}

interface SumStrategy {
    public function sumEven($numbers);
}

class EvenSumStrategy implements SumStrategy {
    public function sumEven($numbers) {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 == 0;
        }));
    }
}

// Test the solution
$numbers = [1, 2, 3, 4, 5, 6];
$strategy = new EvenSumStrategy();
$sumEvenNumbers = new SumEvenNumbers($strategy);
echo $sumEvenNumbers->execute($numbers);
?>
```