```php
<?php

// Problem: Implement a function to find the maximum number in an array using the Strategy design pattern

// Define the Strategy interface
interface Strategy {
    public function findMax(array $numbers);
}

// Implement a concrete strategy to find max using a simple loop
class SimpleLoopStrategy implements Strategy {
    public function findMax(array $numbers) {
        $max = PHP_INT_MIN;
        foreach ($numbers as $number) {
            if ($number > $max) {
                $max = $number;
            }
        }
        return $max;
    }
}

// Implement a concrete strategy to find max using array_reduce
class ReduceStrategy implements Strategy {
    public function findMax(array $numbers) {
        return array_reduce($numbers, function($carry, $item) {
            return max($carry, $item);
        }, PHP_INT_MIN);
    }
}

// Context class to use the strategy
class MaxFinder {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function findMax(array $numbers) {
        return $this->strategy->findMax($numbers);
    }
}

// Usage
$numbers = [3, 5, 1, 2, 4];
$strategy = new SimpleLoopStrategy();
$maxFinder = new MaxFinder($strategy);
echo "Max using SimpleLoopStrategy: " . $maxFinder->findMax($numbers) . "\n";

$strategy = new ReduceStrategy();
$maxFinder->setStrategy($strategy);
echo "Max using ReduceStrategy: " . $maxFinder->findMax($numbers) . "\n";

?>
```