```php
<?php

// Problem: Implement a function to find the second smallest number in an array.

// Design Pattern: Factory Method

class NumberFinder {
    public static function create($numbers) {
        return new NumberFinderImpl($numbers);
    }
}

class NumberFinderImpl {
    private $numbers;

    public function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public function findSecondSmallest() {
        sort($this->numbers);
        $uniqueNumbers = array_unique($this->numbers);
        if (count($uniqueNumbers) < 2) {
            return null;
        }
        return $uniqueNumbers[1];
    }
}

$numbers = [5, 2, 9, 1, 5, 6];
$numberFinder = NumberFinder::create($numbers);
$secondSmallest = $numberFinder->findSecondSmallest();

if ($secondSmallest !== null) {
    echo "The second smallest number is: " . $secondSmallest;
} else {
    echo "The array does not contain enough unique numbers.";
}

?>
```