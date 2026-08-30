```php
<?php

// Problem: Implement a function to sort an array of integers using the Bubble Sort algorithm.

// Solution: Using the Bubble Sort design pattern

function bubbleSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

// Test the function
$array = [64, 34, 25, 12, 22, 11, 90];
echo "Original array: ";
print_r($array);
echo "Sorted array: ";
print_r(bubbleSort($array));
?>
```