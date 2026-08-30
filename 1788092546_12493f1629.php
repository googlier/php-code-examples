```php
<?php
// Problem: Implement a function that takes an array of integers and returns an array of their squares. Use the Strategy pattern to solve this problem.

// Define the Strategy interface
interface SquaringStrategy {
    public function square($number);
}

// Define concrete strategies
class BasicSquaringStrategy implements SquaringStrategy {
    public function square($number) {
        return $number * $number;
    }
}

class DoubleSquaringStrategy implements SquaringStrategy {
    public function square($number) {
        return ($number * $number) * 2;
    }
}

// Context class
class SquaringContext {
    private $strategy;

    public function __construct(SquaringStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SquaringStrategy $strategy) {
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
$numbers = [1, 2, 3, 4, 5];
$strategy = new BasicSquaringStrategy();
$squaringContext = new SquaringContext($strategy);
$squaredNumbers = $squaringContext->squareArray($numbers);
print_r($squaredNumbers);

// Change strategy dynamically
$strategy = new DoubleSquaringStrategy();
$squaringContext->setStrategy($strategy);
$squaredNumbers = $squaringContext->squareArray($numbers);
print_r($squaredNumbers);
?>
```