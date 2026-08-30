```php
<?php

// Define the problem: Implement a function to find the maximum sum of a contiguous subarray of size k in an array.

class MaxSubarraySum {
    private $array;
    private $k;

    public function __construct($array, $k) {
        $this->array = $array;
        $this->k = $k;
    }

    public function findMaxSum() {
        $n = count($this->array);
        if ($n < $this->k) {
            return -1;
        }

        $windowSum = array_sum(array_slice($this->array, 0, $this->k));
        $maxSum = $windowSum;

        for ($i = $this->k; $i < $n; $i++) {
            $windowSum = $windowSum - $this->array[$i - $this->k] + $this->array[$i];
            $maxSum = max($maxSum, $windowSum);
        }

        return $maxSum;
    }
}

// Usage
$array = [1, 4, 2, 10, 23, 3, 1, 0, 20];
$k = 4;
$maxSubarraySum = new MaxSubarraySum($array, $k);
echo "Maximum sum of a contiguous subarray of size $k: " . $maxSubarraySum->findMaxSum();

?>
```