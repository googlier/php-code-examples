```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of all even numbers in the array.

// Design Pattern: Strategy

// Strategy Interface
interface SumStrategy {
    public function sum($numbers);
}

// Concrete Strategy for Summing Even Numbers
class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Context
class NumberSum {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function sum($numbers) {
        return $this->strategy->sum($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$evenSumStrategy = new EvenSumStrategy();
$numberSum = new NumberSum($evenSumStrategy);
echo $numberSum->sum($numbers); // Output: 12
?>
```