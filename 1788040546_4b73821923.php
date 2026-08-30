```php
<?php
// Generate a random programming problem
$problem = "Create a function that takes an array of integers as input and returns the sum of all even numbers in the array.";

// Solve the problem using a random design pattern
$designPattern = "Strategy";

// Define the strategy interface
interface SumStrategy {
    public function calculateSum($numbers);
}

// Define concrete strategies
class EvenSumStrategy implements SumStrategy {
    public function calculateSum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

// Define the context
class SumContext {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->calculateSum($numbers);
    }
}

// Create a context and set the strategy
$context = new SumContext(new EvenSumStrategy());

// Generate a random array of integers
$numbers = array_map(function() { return rand(1, 100); }, range(1, 10));

// Execute the strategy
$result = $context->executeStrategy($numbers);

// Output the result
echo "Input: " . implode(", ", $numbers) . "\n";
echo "Output: " . $result . "\n";
?>
```