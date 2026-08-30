```php
<?php
// Problem: Implement a function that takes an array of integers and returns an array of their squares.

// Design Pattern: Strategy Pattern

class SquareStrategy {
    public function apply($number) {
        return $number * $number;
    }
}

class ArrayProcessor {
    private $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function processArray($array) {
        $result = [];
        foreach ($array as $number) {
            $result[] = $this->strategy->apply($number);
        }
        return $result;
    }
}

// Usage
$inputArray = [1, 2, 3, 4, 5];
$squareStrategy = new SquareStrategy();
$arrayProcessor = new ArrayProcessor($squareStrategy);
$outputArray = $arrayProcessor->processArray($inputArray);

print_r($outputArray); // Output: [1, 4, 9, 16, 25]
?>
```