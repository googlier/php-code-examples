```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of all even numbers. Use the Strategy design pattern to implement different strategies for summing the numbers.

// Define the Strategy interface
interface SumStrategy {
    public function sum($numbers);
}

// Concrete strategy for summing even numbers
class EvenSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 == 0;
        }));
    }
}

// Concrete strategy for summing odd numbers
class OddSumStrategy implements SumStrategy {
    public function sum($numbers) {
        return array_sum(array_filter($numbers, function($num) {
            return $num % 2 != 0;
        }));
    }
}

// Context class that uses a strategy
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
$evenSum = new NumberSum(new EvenSumStrategy());
echo $evenSum->sum($numbers); // Output: 12

$oddSum = new NumberSum(new OddSumStrategy());
echo $oddSum->sum($numbers); // Output: 9
?>
```