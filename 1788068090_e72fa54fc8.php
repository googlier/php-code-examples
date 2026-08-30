```php
<?php
// Problem: Implement a function to calculate the sum of all even numbers in an array using the Strategy Design Pattern.

// Define the Strategy interface
interface Strategy {
    public function execute($data);
}

// Concrete Strategy for summing even numbers
class SumEvenNumbersStrategy implements Strategy {
    public function execute($data) {
        return array_sum(array_filter($data, function($num) {
            return $num % 2 == 0;
        }));
    }
}

// Context to use the strategy
class Context {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($data) {
        return $this->strategy->execute($data);
    }
}

// Example usage
$data = [1, 2, 3, 4, 5, 6];
$context = new Context(new SumEvenNumbersStrategy());
echo $context->executeStrategy($data); // Output: 12
?>
```