```php
<?php
// Generate a random programming problem
$problem = "Design a function that takes an array of integers and returns the maximum sum of any contiguous subarray.";

// Generate a random design pattern
$designPattern = "Strategy";

// Generate random PHP code for the problem using the selected design pattern
$code = '<?php
abstract class MaxSumStrategy {
    abstract public function getMaxSum($array);
}

class KadaneStrategy extends MaxSumStrategy {
    public function getMaxSum($array) {
        $maxSoFar = PHP_INT_MIN;
        $maxEndingHere = 0;
        foreach ($array as $num) {
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

class MaxSumCalculator {
    private $strategy;

    public function __construct(MaxSumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateMaxSum($array) {
        return $this->strategy->getMaxSum($array);
    }
}

// Usage
$array = [3, -2, 5, -1];
$strategy = new KadaneStrategy();
$calculator = new MaxSumCalculator($strategy);
echo "Maximum Sum: " . $calculator->calculateMaxSum($array);
?>';

// Output the problem, design pattern, and PHP code
echo "Problem: $problem\n";
echo "Design Pattern: $designPattern\n";
echo "PHP Code:\n$code\n";
?>
```