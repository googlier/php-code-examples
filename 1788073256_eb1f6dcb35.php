```php
<?php
$numbers = range(1, 100);
$shuffle = array_rand($numbers, 10);
$target = array_sum($shuffle);
$pattern = 'Strategy';

interface Strategy {
    public function calculate($numbers);
}

class SumStrategy implements Strategy {
    public function calculate($numbers) {
        return array_sum($numbers);
    }
}

class MaxStrategy implements Strategy {
    public function calculate($numbers) {
        return max($numbers);
    }
}

class MinStrategy implements Strategy {
    public function calculate($numbers) {
        return min($numbers);
    }
}

class Context {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->calculate($numbers);
    }
}

$factory = [
    'SumStrategy' => 'new SumStrategy()',
    'MaxStrategy' => 'new MaxStrategy()',
    'MinStrategy' => 'new MinStrategy()'
];

$randomStrategy = $factory[$pattern];
$context = new Context($randomStrategy);
$result = $context->executeStrategy($shuffle);

echo "Target: " . $target . "\n";
echo "Selected Strategy: " . $pattern . "\n";
echo "Result: " . $result . "\n";
?>
```