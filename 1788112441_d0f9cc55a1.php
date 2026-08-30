```php
<?php
// Problem: Implement a function to find the kth largest element in an array without using any built-in sorting functions.

// Design Pattern: Quickselect

function quickselect($arr, $k) {
    $pivot = $arr[floor(count($arr) / 2)];
    $left = array_filter($arr, function($x) use ($pivot) { return $x < $pivot; });
    $middle = array_filter($arr, function($x) use ($pivot) { return $x == $pivot; });
    $right = array_filter($arr, function($x) use ($pivot) { return $x > $pivot; });

    $k = count($left) + 1;

    if ($k == $middle[0]) {
        return $middle[0];
    } elseif ($k < $middle[0]) {
        return quickselect($middle, $k);
    } else {
        return quickselect($right, $k - count($left) - count($middle));
    }
}

// Example usage
$arr = [3, 2, 1, 5, 6, 4];
$k = 2;
echo "The $k-th largest element is: " . quickselect($arr, $k);
?>
```