```php
<?php
// Define a class for a simple calculator
class Calculator {
    public function add($a, $b) {
        return $a + $b;
    }
    
    public function subtract($a, $b) {
        return $a - $b;
    }
    
    public function multiply($a, $b) {
        return $a * $b;
    }
    
    public function divide($a, $b) {
        if ($b == 0) {
            throw new Exception("Division by zero error");
        }
        return $a / $b;
    }
}

// Implement the Factory Design Pattern to create calculator instances
class CalculatorFactory {
    public static function getCalculator($type) {
        if ($type == 'basic') {
            return new Calculator();
        } else {
            throw new Exception("Unknown calculator type");
        }
    }
}

// Usage
try {
    $calculator = CalculatorFactory::getCalculator('basic');
    echo "Addition: " . $calculator->add(5, 3) . "<br>";
    echo "Subtraction: " . $calculator->subtract(5, 3) . "<br>";
    echo "Multiplication: " . $calculator->multiply(5, 3) . "<br>";
    echo "Division: " . $calculator->divide(5, 3) . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```