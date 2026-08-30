```php
<?php

// Random Programming Problem:
// Implement a function that takes an array of integers and returns the maximum product of any two distinct numbers in the array.

// Design Pattern: Strategy

class MaxProductCalculator {
    public function calculate($numbers) {
        $max1 = PHP_INT_MIN;
        $max2 = PHP_INT_MIN;
        
        foreach ($numbers as $number) {
            if ($number > $max1) {
                $max2 = $max1;
                $max1 = $number;
            } elseif ($number > $max2) {
                $max2 = $number;
            }
        }
        
        return $max1 * $max2;
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5];
$calculator = new MaxProductCalculator();
echo $calculator->calculate($numbers); // Output: 20

?>
```