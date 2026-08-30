```php
<?php

// Generate a random programming problem
$problem = [
    'function' => 'calculateFibonacci',
    'parameters' => 'n',
    'description' => 'Write a function that calculates the nth Fibonacci number.'
];

// Generate a random design pattern
$designPattern = 'Strategy';

// Create a class for the design pattern
class FibonacciStrategy {
    public function calculate($n) {
        if ($n <= 1) {
            return $n;
        }
        return $this->calculate($n - 1) + $this->calculate($n - 2);
    }
}

// Implement the design pattern in the problem's solution
class ProblemSolution {
    private $strategy;

    public function __construct(FibonacciStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function execute($n) {
        return $this->strategy->calculate($n);
    }
}

// Create an instance of the problem's solution
$strategy = new FibonacciStrategy();
$solution = new ProblemSolution($strategy);

// Execute the problem's solution with a random parameter
$n = rand(1, 20);
$result = $solution->execute($n);

echo "The {$problem['function']}($n) is: " . $result;

?>
```