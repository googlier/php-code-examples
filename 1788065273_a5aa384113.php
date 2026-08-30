```php
<?php
// Problem: Implement a function to find the second largest number in an array of integers.

// Design Pattern: Factory Method

class NumberFinderFactory {
    public static function createNumberFinder($numbers) {
        return new NumberFinder($numbers);
    }
}

class NumberFinder {
    private $numbers;

    public function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public function findSecondLargest() {
        if (count($this->numbers) < 2) {
            throw new Exception("Array must contain at least two elements");
        }

        $first = $second = PHP_INT_MIN;
        foreach ($this->numbers as $number) {
            if ($number > $first) {
                $second = $first;
                $first = $number;
            } elseif ($number > $second && $number != $first) {
                $second = $number;
            }
        }

        if ($second == PHP_INT_MIN) {
            throw new Exception("Array does not contain a second largest number");
        }

        return $second;
    }
}

$numbers = [5, 9, 3, 12, 4, 15, 2];
$numberFinder = NumberFinderFactory::createNumberFinder($numbers);
echo "Second largest number: " . $numberFinder->findSecondLargest();
?>
```