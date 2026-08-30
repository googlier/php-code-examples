```php
<?php
// Problem: Implement a function that takes an array of integers and returns the largest sum of a contiguous subarray.

// Design Pattern: Strategy

class SubarraySumStrategy {
    public function getMaxSum($arr) {
        $max_so_far = PHP_INT_MIN;
        $max_ending_here = 0;

        foreach ($arr as $value) {
            $max_ending_here += $value;
            if ($max_so_far < $max_ending_here) {
                $max_so_far = $max_ending_here;
            }
            if ($max_ending_here < 0) {
                $max_ending_here = 0;
            }
        }

        return $max_so_far;
    }
}

// Usage
$arr = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$strategy = new SubarraySumStrategy();
echo $strategy->getMaxSum($arr);
?>
```