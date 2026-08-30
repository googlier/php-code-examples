```php
<?php
// Problem: Generate a simple calculator that performs addition, subtraction, multiplication, and division based on user input

// Design Pattern: Strategy

class Calculator {
    protected $strategy;

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function execute($a, $b) {
        return $this->strategy->calculate($a, $b);
    }
}

interface Strategy {
    public function calculate($a, $b);
}

class Addition implements Strategy {
    public function calculate($a, $b) {
        return $a + $b;
    }
}

class Subtraction implements Strategy {
    public function calculate($a, $b) {
        return $a - $b;
    }
}

class Multiplication implements Strategy {
    public function calculate($a, $b) {
        return $a * $b;
    }
}

class Division implements Strategy {
    public function calculate($a, $b) {
        if ($b == 0) {
            throw new Exception("Division by zero is not allowed");
        }
        return $a / $b;
    }
}

$calculator = new Calculator();

// Example usage:
$calculator->setStrategy(new Addition());
echo $calculator->execute(5, 3); // Output: 8

$calculator->setStrategy(new Subtraction());
echo $calculator->execute(5, 3); // Output: 2

$calculator->setStrategy(new Multiplication());
echo $calculator->execute(5, 3); // Output: 15

$calculator->setStrategy(new Division());
echo $calculator->execute(5, 3); // Output: 1.6666666666666667
?>
```