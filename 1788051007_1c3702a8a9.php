```php
<?php
// Problem: Implement a simple calculator that can perform addition, subtraction, multiplication, and division. The calculator should accept two numbers and an operation as input and return the result.

// Design Pattern: Strategy

class Operation {
    public function execute($num1, $num2) {
        throw new Exception("Operation not supported");
    }
}

class Addition extends Operation {
    public function execute($num1, $num2) {
        return $num1 + $num2;
    }
}

class Subtraction extends Operation {
    public function execute($num1, $num2) {
        return $num1 - $num2;
    }
}

class Multiplication extends Operation {
    public function execute($num1, $num2) {
        return $num1 * $num2;
    }
}

class Division extends Operation {
    public function execute($num1, $num2) {
        if ($num2 == 0) {
            throw new Exception("Division by zero");
        }
        return $num1 / $num2;
    }
}

class Calculator {
    private $operation;

    public function setOperation($operation) {
        $this->operation = $operation;
    }

    public function calculate($num1, $num2) {
        return $this->operation->execute($num1, $num2);
    }
}

// Usage
$calculator = new Calculator();

// Perform addition
$calculator->setOperation(new Addition());
echo $calculator->calculate(5, 3) . "\n"; // Output: 8

// Perform subtraction
$calculator->setOperation(new Subtraction());
echo $calculator->calculate(5, 3) . "\n"; // Output: 2

// Perform multiplication
$calculator->setOperation(new Multiplication());
echo $calculator->calculate(5, 3) . "\n"; // Output: 15

// Perform division
$calculator->setOperation(new Division());
echo $calculator->calculate(5, 3) . "\n"; // Output: 1.6666666666666667
?>
```