```php
<?php
// Problem: Create a function that takes an array of integers and returns the second largest number.

// Design Pattern: Factory Method

class NumberFinder {
    public static function create($numbers) {
        return new SecondLargestNumberFinder($numbers);
    }
}

class SecondLargestNumberFinder {
    private $numbers;

    public function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public function find() {
        $first = PHP_INT_MIN;
        $second = PHP_INT_MIN;

        foreach ($this->numbers as $number) {
            if ($number > $first) {
                $second = $first;
                $first = $number;
            } elseif ($number > $second && $number != $first) {
                $second = $number;
            }
        }

        return $second;
    }
}

$numbers = [1, 3, 5, 7, 9, 2, 4, 6, 8];
$finder = NumberFinder::create($numbers);
echo $finder->find(); // Output: 8
?>
```