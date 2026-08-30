```php
<?php
// Problem: Create a function that takes an array of integers and returns an array containing the sum of every two consecutive elements.

// Design Pattern: Strategy

// Interface
interface SumStrategy {
    public function sum($a, $b);
}

// Concrete Strategy
class BasicSumStrategy implements SumStrategy {
    public function sum($a, $b) {
        return $a + $b;
    }
}

// Context
class ConsecutiveSum {
    private $strategy;

    public function __construct(SumStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function getConsecutiveSums(array $numbers) {
        $result = [];
        for ($i = 0; $i < count($numbers) - 1; $i++) {
            $result[] = $this->strategy->sum($numbers[$i], $numbers[$i + 1]);
        }
        return $result;
    }
}

// Usage
$strategy = new BasicSumStrategy();
$consecutiveSum = new ConsecutiveSum($strategy);
$numbers = [1, 2, 3, 4, 5];
echo json_encode($consecutiveSum->getConsecutiveSums($numbers));
?>
```