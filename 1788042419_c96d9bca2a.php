```php
<?php
// Problem: Generate a function to find the shortest word in an array of strings

// Design Pattern: Strategy

class ShortestWordFinder {
    protected $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function find($words) {
        return $this->strategy->execute($words);
    }
}

interface Strategy {
    public function execute($words);
}

class LengthStrategy implements Strategy {
    public function execute($words) {
        $shortest = array_reduce($words, function($shortest, $word) {
            return strlen($shortest) < strlen($word) ? $shortest : $word;
        });
        return $shortest;
    }
}

class AlphabeticStrategy implements Strategy {
    public function execute($words) {
        sort($words);
        return $words[0];
    }
}

$words = ["apple", "banana", "cherry", "date"];
$strategy = new LengthStrategy();
$finder = new ShortestWordFinder($strategy);
echo "Shortest word by length: " . $finder->find($words) . "\n";

$strategy = new AlphabeticStrategy();
$finder = new ShortestWordFinder($strategy);
echo "Shortest word alphabetically: " . $finder->find($words) . "\n";
?>
```