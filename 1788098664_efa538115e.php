```php
<?php
// Problem: Implement a function to calculate the factorial of a number using the Strategy design pattern.

// Define the Strategy interface
interface FactorialStrategy {
    public function calculate($number);
}

// Concrete strategy for factorial calculation
class RecursiveFactorial implements FactorialStrategy {
    public function calculate($number) {
        if ($number <= 1) {
            return 1;
        }
        return $number * $this->calculate($number - 1);
    }
}

// Concrete strategy for factorial calculation using iteration
class IterativeFactorial implements FactorialStrategy {
    public function calculate($number) {
        $result = 1;
        for ($i = 2; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

// Context class that uses a strategy
class FactorialCalculator {
    private $strategy;

    public function setStrategy(FactorialStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculate($number) {
        return $this->strategy->calculate($number);
    }
}

// Usage
$calculator = new FactorialCalculator();
$calculator->setStrategy(new RecursiveFactorial());
echo $calculator->calculate(5); // Output: 120

$calculator->setStrategy(new IterativeFactorial());
echo $calculator->calculate(5); // Output: 120
?>
```