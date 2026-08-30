```php
<?php
// Problem: Implement a function to calculate the factorial of a given number using the Decorator design pattern.

// Interface
interface Calculator {
    public function calculate($number);
}

// Concrete Component
class FactorialCalculator implements Calculator {
    public function calculate($number) {
        if ($number < 0) {
            throw new InvalidArgumentException("Number must be non-negative");
        }
        $result = 1;
        for ($i = 1; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

// Decorator
abstract class CalculatorDecorator implements Calculator {
    protected $calculator;

    public function __construct(Calculator $calculator) {
        $this->calculator = $calculator;
    }

    public function calculate($number) {
        return $this->calculator->calculate($number);
    }
}

// Concrete Decorator
class LogDecorator extends CalculatorDecorator {
    public function calculate($number) {
        $result = parent::calculate($number);
        error_log("Calculated factorial of {$number} is {$result}");
        return $result;
    }
}

// Usage
try {
    $calculator = new FactorialCalculator();
    $decoratedCalculator = new LogDecorator($calculator);
    echo $decoratedCalculator->calculate(5);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
?>
```