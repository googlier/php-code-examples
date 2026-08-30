```php
<?php

// Random Programming Problem: 
// Implement a function that takes an array of integers as input and returns the second largest number in the array.

// Random Design Pattern: 
// Strategy Pattern

class LargestNumberFinder {
    public function findSecondLargest($numbers) {
        if (count($numbers) < 2) {
            throw new Exception("Array must contain at least two elements");
        }
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

$numbers = [5, 3, 8, 1, 4, 9, 2];
$finder = new LargestNumberFinder();
echo $finder->findSecondLargest($numbers);
?>
```