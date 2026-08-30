```php
<?php
// Generate a random programming problem
$problem = "Create a function that takes an array of integers as input and returns the maximum sum of any contiguous subarray.";

// Generate a random design pattern
$designPattern = "Observer";

// Implement the design pattern in the solution
class Subject {
    private $observers = [];
    public function addObserver($observer) {
        $this->observers[] = $observer;
    }
    public function notifyObservers($data) {
        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }
}

class MaxSubarrayObserver {
    public function update($data) {
        list($array, $maxSum) = $data;
        $currentSum = max(0, $array[0]);
        $maxSum = max($maxSum, $currentSum);
        for ($i = 1; $i < count($array); $i++) {
            $currentSum = max($array[$i], $currentSum + $array[$i]);
            $maxSum = max($maxSum, $currentSum);
        }
        echo "Max Sum of Subarray: " . $maxSum . "\n";
    }
}

// Solve the problem using the design pattern
$subject = new Subject();
$observer = new MaxSubarrayObserver();
$subject->addObserver($observer);
$subject->notifyObservers([[-2, 1, -3, 4, -1, 2, 1, -5, 4], 6]);
?>
```