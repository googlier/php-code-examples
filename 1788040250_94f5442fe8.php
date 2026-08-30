```php
<?php
// Problem: Implement a function to find the maximum element in an array using the Strategy design pattern.

// Interface for the strategy
interface MaxFinderStrategy {
    public function findMax($array);
}

// Concrete strategy to find max using a loop
class LoopMaxStrategy implements MaxFinderStrategy {
    public function findMax($array) {
        $max = $array[0];
        foreach ($array as $value) {
            if ($value > $max) {
                $max = $value;
            }
        }
        return $max;
    }
}

// Concrete strategy to find max using array_reduce
class ReduceMaxStrategy implements MaxFinderStrategy {
    public function findMax($array) {
        return array_reduce($array, function($carry, $item) {
            return $carry > $item ? $carry : $item;
        });
    }
}

// Context class that uses a strategy to find max
class MaxFinderContext {
    private $strategy;

    public function __construct(MaxFinderStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(MaxFinderStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function findMax($array) {
        return $this->strategy->findMax($array);
    }
}

// Usage
$array = [3, 5, 1, 2, 4];
$maxFinder = new MaxFinderContext(new LoopMaxStrategy());
echo "Max using loop: " . $maxFinder->findMax($array) . "\n";

$maxFinder->setStrategy(new ReduceMaxStrategy());
echo "Max using reduce: " . $maxFinder->findMax($array) . "\n";
?>
```