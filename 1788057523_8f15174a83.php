```php
<?php

// Random programming problem: Implement a function to calculate the nth Fibonacci number using the Decorator design pattern.

// Define the Component interface
interface FibonacciComponent {
    public function calculate($n);
}

// Concrete Component
class FibonacciBasic implements FibonacciComponent {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Decorator
abstract class FibonacciDecorator implements FibonacciComponent {
    protected $fibonacciComponent;

    public function __construct(FibonacciComponent $fibonacciComponent) {
        $this->fibonacciComponent = $fibonacciComponent;
    }

    public function calculate($n) {
        return $this->fibonacciComponent->calculate($n);
    }
}

// Concrete Decorator
class FibonacciMemoization extends FibonacciDecorator {
    private $memo = [];

    public function calculate($n) {
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = parent::calculate($n);
        }
        return $this->memo[$n];
    }
}

// Usage
$fibonacciBasic = new FibonacciBasic();
$fibonacciMemoization = new FibonacciMemoization($fibonacciBasic);

echo $fibonacciBasic->calculate(10); // Output: 55
echo $fibonacciMemoization->calculate(10); // Output: 55 (faster with memoization)

?>
```