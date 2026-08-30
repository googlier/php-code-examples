```php
<?php
// Problem: Create a function that takes an array of integers as input and returns a new array where each element is the square of the corresponding element in the input array.

// Design Pattern: Strategy

interface SquaringStrategy {
    public function square($number);
}

class SimpleSquaringStrategy implements SquaringStrategy {
    public function square($number) {
        return $number * $number;
    }
}

class ArraySquarer {
    private $strategy;

    public function __construct(SquaringStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function squareArray($array) {
        $result = [];
        foreach ($array as $value) {
            $result[] = $this->strategy->square($value);
        }
        return $result;
    }
}

// Usage
$inputArray = [1, 2, 3, 4, 5];
$strategy = new SimpleSquaringStrategy();
$squarer = new ArraySquarer($strategy);
$outputArray = $squarer->squareArray($inputArray);

print_r($outputArray);
?>
```