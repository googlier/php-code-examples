```php
<?php
// Problem: Implement a function that takes an array of integers and returns a new array containing the squares of the input array elements.

// Design Pattern: Strategy Pattern

interface SquareStrategy {
    public function square($number);
}

class DefaultSquareStrategy implements SquareStrategy {
    public function square($number) {
        return $number * $number;
    }
}

class AdvancedSquareStrategy implements SquareStrategy {
    public function square($number) {
        return pow($number, 3);
    }
}

class SquareArray {
    private $strategy;

    public function __construct(SquareStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function squareArray($array) {
        $result = [];
        foreach ($array as $number) {
            $result[] = $this->strategy->square($number);
        }
        return $result;
    }
}

// Usage
$inputArray = [1, 2, 3, 4, 5];
$strategy = new DefaultSquareStrategy();
$squareArray = new SquareArray($strategy);
$result = $squareArray->squareArray($inputArray);
print_r($result);
?>
```