```php
<?php

// Random Problem: Implement a function that takes an array of integers and returns the second largest number in the array.

// Design Pattern: Strategy

interface NumberFinder {
    public function find(array $numbers);
}

class SecondLargestFinder implements NumberFinder {
    public function find(array $numbers) {
        $max1 = PHP_INT_MIN;
        $max2 = PHP_INT_MIN;

        foreach ($numbers as $number) {
            if ($number > $max1) {
                $max2 = $max1;
                $max1 = $number;
            } elseif ($number > $max2 && $number != $max1) {
                $max2 = $number;
            }
        }

        return $max2;
    }
}

$numbers = [5, 2, 8, 1, 9, 3, 10, 7, 4, 6];
$strategy = new SecondLargestFinder();
echo $strategy->find($numbers);

?>
```