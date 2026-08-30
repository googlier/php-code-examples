```php
<?php
// Problem: Implement a function that takes an array of integers and returns an array of their squares.

// Design Pattern: Strategy Pattern

interface SquareStrategy {
    public function square($number);
}

class SquareAllStrategy implements SquareStrategy {
    public function square($number) {
        return $number * $number;
    }
}

class ArraySquarer {
    private $strategy;

    public function __construct(SquareStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function squareArray($array) {
        return array_map(function($num) {
            return $this->strategy->square($num);
        }, $array);
    }
}

// Usage
$strategy = new SquareAllStrategy();
$squarer = new ArraySquarer($strategy);
$inputArray = [1, 2, 3, 4, 5];
$outputArray = $squarer->squareArray($inputArray);
print_r($outputArray);
?>
```