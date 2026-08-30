```php
<?php

// Problem: Implement a function that takes an array of integers and returns the maximum product of any three numbers in the array.
// Design Pattern: Factory Method

class MaxProductCalculator {
    public static function create($array) {
        return new MaxProductCalculator($array);
    }

    private $array;

    private function __construct($array) {
        $this->array = $array;
    }

    public function calculate() {
        sort($this->array);
        $n = count($this->array);
        $maxProduct1 = $this->array[$n - 1] * $this->array[$n - 2] * $this->array[$n - 3];
        $maxProduct2 = $this->array[0] * $this->array[1] * $this->array[$n - 1];
        return max($maxProduct1, $maxProduct2);
    }
}

$inputArray = [1, 10, -5, 1, -100];
$calculator = MaxProductCalculator::create($inputArray);
echo $calculator->calculate(); // Output: 5000

?>
```