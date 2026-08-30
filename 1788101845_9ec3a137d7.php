```php
<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

class SumCalculator {
    public function calculateSum($numbers) {
        return array_sum($numbers);
    }
}

$calculator = new SumCalculator();
echo "Sum of numbers: " . $calculator->calculateSum($numbers);
?>
```