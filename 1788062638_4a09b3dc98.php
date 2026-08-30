```php
<?php
// Random programming problem: Implement a function to find the maximum sum of a subarray in a given array of integers.

// Random design pattern: Singleton

class MaxSubarraySum {
    private static $instance = null;
    private $array;

    private function __construct($array) {
        $this->array = $array;
    }

    public static function getInstance($array) {
        if (self::$instance === null) {
            self::$instance = new MaxSubarraySum($array);
        }
        return self::$instance;
    }

    public function findMaxSum() {
        $maxSoFar = PHP_INT_MIN;
        $maxEndingHere = 0;

        foreach ($this->array as $num) {
            $maxEndingHere += $num;
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

// Usage
$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$instance = MaxSubarraySum::getInstance($array);
echo "Maximum subarray sum is " . $instance->findMaxSum();
?>
```