```php
<?php
// Problem: Generate a function that takes an array of integers and returns the maximum sum of a contiguous subarray.

// Design Pattern: Kadane's Algorithm

function maxSubArraySum($arr) {
    $max_current = $max_global = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $max_current = max($arr[$i], $max_current + $arr[$i]);
        if ($max_current > $max_global) {
            $max_global = $max_current;
        }
    }
    return $max_global;
}

// Example usage
$arr = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo "Maximum contiguous sum is " . maxSubArraySum($arr);
?>
```