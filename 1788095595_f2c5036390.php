```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of the even numbers.

// Design Pattern: Strategy

class SumEvenCalculator {
    public function calculate($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

$calculator = new SumEvenCalculator();
$numbers = [1, 2, 3, 4, 5, 6];
echo $calculator->calculate($numbers);
?>
```