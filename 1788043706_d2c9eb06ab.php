```php
<?php
// Problem: Generate a function that takes an array of integers and returns an array of their squares.
// Design Pattern: Strategy

interface SquareStrategy {
    public function square($number);
}

class BasicSquareStrategy implements SquareStrategy {
    public function square($number) {
        return $number * $number;
    }
}

class AdvancedSquareStrategy implements SquareStrategy {
    public function square($number) {
        return pow($number, 2);
    }
}

class NumberSquarer {
    private $strategy;

    public function __construct(SquareStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function squareArray($numbers) {
        $result = [];
        foreach ($numbers as $number) {
            $result[] = $this->strategy->square($number);
        }
        return $result;
    }
}

// Usage
$basicStrategy = new BasicSquareStrategy();
$advancedStrategy = new AdvancedSquareStrategy();

$squarer1 = new NumberSquarer($basicStrategy);
$squarer2 = new NumberSquarer($advancedStrategy);

$numbers = [1, 2, 3, 4, 5];
echo implode(", ", $squarer1->squareArray($numbers)) . "\n"; // Outputs: 1, 4, 9, 16, 25
echo implode(", ", $squarer2->squareArray($numbers)) . "\n"; // Outputs: 1, 4, 9, 16, 25
?>
```