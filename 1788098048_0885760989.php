```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all even numbers in the array. Use the Strategy design pattern to allow for different ways of filtering numbers (e.g., even, odd, prime).

interface NumberFilter {
    public function filter($numbers);
}

class EvenNumberFilter implements NumberFilter {
    public function filter($numbers) {
        return array_filter($numbers, function($num) {
            return $num % 2 == 0;
        });
    }
}

class SumCalculator {
    private $filter;

    public function __construct(NumberFilter $filter) {
        $this->filter = $filter;
    }

    public function calculateSum($numbers) {
        $filteredNumbers = $this->filter->filter($numbers);
        return array_sum($filteredNumbers);
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6];
$filter = new EvenNumberFilter();
$calculator = new SumCalculator($filter);
echo $calculator->calculateSum($numbers); // Output: 12
?>
```