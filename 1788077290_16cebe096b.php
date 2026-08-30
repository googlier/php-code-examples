```php
<?php
// Problem: Implement a function to sort an array of integers using a random sorting algorithm.

// Design Pattern: QuickSort

function quickSort($array) {
    if (count($array) <= 1) {
        return $array;
    }

    $pivot = $array[0];
    $left = [];
    $right = [];

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

// Test the function
$array = [3, 6, 8, 10, 1, 2, 1];
echo implode(', ', quickSort($array));
?>
```