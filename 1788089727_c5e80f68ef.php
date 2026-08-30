```php
<?php
// Problem: Implement a function that calculates the factorial of a given number using the Decorator design pattern.

// Interface for calculating factorials
interface FactorialCalculator {
    public function calculate($number);
}

// Concrete implementation of the FactorialCalculator
class BasicFactorialCalculator implements FactorialCalculator {
    public function calculate($number) {
        if ($number == 0) return 1;
        return $number * $this->calculate($number - 1);
    }
}

// Decorator for adding caching to the FactorialCalculator
class CachingFactorialDecorator implements FactorialCalculator {
    private $calculator;
    private $cache = [];

    public function __construct(FactorialCalculator $calculator) {
        $this->calculator = $calculator;
    }

    public function calculate($number) {
        if (isset($this->cache[$number])) {
            return $this->cache[$number];
        }
        $result = $this->calculator->calculate($number);
        $this->cache[$number] = $result;
        return $result;
    }
}

// Usage
$calculator = new CachingFactorialDecorator(new BasicFactorialCalculator());
echo $calculator->calculate(5); // Output: 120
?>
```