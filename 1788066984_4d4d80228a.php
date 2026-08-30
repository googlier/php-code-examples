```php
<?php
// Problem: Implement a function that takes an array of integers and returns a new array with the elements shuffled randomly.

// Design Pattern: Strategy

// Define the strategy interface
interface ShuffleStrategy {
    public function shuffle(array $array): array;
}

// Implement the shuffle strategy using Fisher-Yates algorithm
class FisherYatesShuffleStrategy implements ShuffleStrategy {
    public function shuffle(array $array): array {
        $n = count($array);
        for ($i = $n - 1; $i > 0; $i--) {
            $j = mt_rand(0, $i);
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        }
        return $array;
    }
}

// Implement the shuffle strategy using PHP's built-in shuffle function
class BuiltInShuffleStrategy implements ShuffleStrategy {
    public function shuffle(array $array): array {
        shuffle($array);
        return $array;
    }
}

// Context class to use the shuffle strategy
class ShuffleContext {
    private $strategy;

    public function __construct(ShuffleStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function shuffle(array $array): array {
        return $this->strategy->shuffle($array);
    }
}

// Usage
$shuffleStrategy = new FisherYatesShuffleStrategy();
$context = new ShuffleContext($shuffleStrategy);

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$shuffledArray = $context->shuffle($array);

print_r($shuffledArray);
?>
```