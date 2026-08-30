```php
<?php
// Problem: Implement a function to find the maximum sum of a contiguous subarray within a one-dimensional array of numbers.

// Design Pattern: Kadane's Algorithm

function maxSubArraySum($a, $size) {
    $max_so_far = PHP_INT_MIN;
    $max_ending_here = 0;

    for ($i = 0; $i < $size; $i++) {
        $max_ending_here = $max_ending_here + $a[$i];
        if ($max_so_far < $max_ending_here) {
            $max_so_far = $max_ending_here;
        }
        if ($max_ending_here < 0) {
            $max_ending_here = 0;
        }
    }
    return $max_so_far;
}

// Example usage:
$a = array(1, -3, 2, 1, -1);
$n = sizeof($a);
echo "Maximum contiguous sum is " . maxSubArraySum($a, $n);
?>
```