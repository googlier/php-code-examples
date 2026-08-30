```php
<?php
// Problem: Implement a function that takes an array of integers and returns a new array with each element squared.

// Design Pattern: Strategy Pattern

interface SquareStrategy {
    public function square($number);
}

class NormalSquare implements SquareStrategy {
    public function square($number) {
        return $number * $number;
    }
}

class CubeSquare implements SquareStrategy {
    public function square($number) {
        return $number * $number * $number;
    }
}

class ArraySquarer {
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
$normalSquareStrategy = new NormalSquare();
$cubeSquareStrategy = new CubeSquare();

$squarer = new ArraySquarer($normalSquareStrategy);
$result = $squarer->squareArray([1, 2, 3, 4, 5]);
print_r($result); // Output: Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 [4] => 25 )

$squarer = new ArraySquarer($cubeSquareStrategy);
$result = $squarer->squareArray([1, 2, 3, 4, 5]);
print_r($result); // Output: Array ( [0] => 1 [1] => 8 [2] => 27 [3] => 64 [4] => 125 )
?>
```