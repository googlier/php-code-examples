```php
<?php

// Generate a random number between 1 and 100
$number = rand(1, 100);

// Define a design pattern
$designPattern = 'Strategy';

// Define a strategy interface
interface Strategy {
    public function execute($number);
}

// Implement strategies
class OddStrategy implements Strategy {
    public function execute($number) {
        return $number % 2 !== 0;
    }
}

class EvenStrategy implements Strategy {
    public function execute($number) {
        return $number % 2 === 0;
    }
}

// Create context
class Context {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($number) {
        return $this->strategy->execute($number);
    }
}

// Apply design pattern
if ($designPattern === 'Strategy') {
    $strategy = $number % 2 === 0 ? new EvenStrategy() : new OddStrategy();
    $context = new Context($strategy);
    $result = $context->executeStrategy($number);
    echo "The number " . $number . " is " . ($result ? "even" : "odd") . ".\n";
}

?>
```