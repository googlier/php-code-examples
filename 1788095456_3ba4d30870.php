```php
<?php

// Generate a random programming problem
$problem = 'Create a function that takes an array of integers and returns the maximum sum of a contiguous subarray.';

// Create a random design pattern
$designPattern = 'Strategy';

// Solve the problem using the selected design pattern
class MaxSubarraySum {
    protected $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function execute($array) {
        return $this->strategy->maxSum($array);
    }
}

interface Strategy {
    public function maxSum($array);
}

class KadaneStrategy implements Strategy {
    public function maxSum($array) {
        $maxSoFar = PHP_INT_MIN;
        $maxEndingHere = 0;

        foreach ($array as $value) {
            $maxEndingHere += $value;
            if ($maxSoFar < $maxEndingHere) {
                $maxSoFar = $maxEndingHere;
            }
            if ($maxEndingHere < 0) {
                $maxEndingHere = 0;
            }
        }

        return $maxSoFar;
    }
}

// Example usage
$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$strategy = new KadaneStrategy();
$maxSubarraySum = new MaxSubarraySum($strategy);
echo $maxSubarraySum->execute($array); // Output: 6

?>
```