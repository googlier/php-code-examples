```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of the even numbers in the array.

// Design Pattern: Strategy

interface SumStrategy {
    public function sumEvenNumbers($numbers);
}

class SumEvenStrategy implements SumStrategy {
    public function sumEvenNumbers($numbers) {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 == 0;
        }));
    }
}

class SumOddStrategy implements SumStrategy {
    public function sumEvenNumbers($numbers) {
        return array_sum(array_filter($numbers, function($number) {
            return $number % 2 != 0;
        }));
    }
}

class NumberProcessor {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function process($numbers) {
        return $this->strategy->sumEvenNumbers($numbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenSum = new NumberProcessor(new SumEvenStrategy());
echo "Sum of even numbers: " . $evenSum->process($numbers);

$oddSum = new NumberProcessor(new SumOddStrategy());
echo "Sum of odd numbers: " . $oddSum->process($numbers);
?>
```