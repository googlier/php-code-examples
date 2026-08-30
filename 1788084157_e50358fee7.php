```php
<?php
// Problem: Implement a simple calculator using the Strategy design pattern to perform addition, subtraction, multiplication, and division.

// Strategy Interface
interface CalculatorStrategy {
    public function calculate($a, $b);
}

// Concrete Strategy for Addition
class AdditionStrategy implements CalculatorStrategy {
    public function calculate($a, $b) {
        return $a + $b;
    }
}

// Concrete Strategy for Subtraction
class SubtractionStrategy implements CalculatorStrategy {
    public function calculate($a, $b) {
        return $a - $b;
    }
}

// Concrete Strategy for Multiplication
class MultiplicationStrategy implements CalculatorStrategy {
    public function calculate($a, $b) {
        return $a * $b;
    }
}

// Concrete Strategy for Division
class DivisionStrategy implements CalculatorStrategy {
    public function calculate($a, $b) {
        if ($b == 0) {
            throw new Exception("Cannot divide by zero");
        }
        return $a / $b;
    }
}

// Context
class Calculator {
    private $strategy;

    public function setStrategy(CalculatorStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($a, $b) {
        return $this->strategy->calculate($a, $b);
    }
}

// Usage
$calculator = new Calculator();
$calculator->setStrategy(new AdditionStrategy());
echo $calculator->executeStrategy(5, 3) . "\n"; // Output: 8

$calculator->setStrategy(new SubtractionStrategy());
echo $calculator->executeStrategy(5, 3) . "\n"; // Output: 2

$calculator->setStrategy(new MultiplicationStrategy());
echo $calculator->executeStrategy(5, 3) . "\n"; // Output: 15

$calculator->setStrategy(new DivisionStrategy());
echo $calculator->executeStrategy(5, 3) . "\n"; // Output: 1.6666666666667
?>
```