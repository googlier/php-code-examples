```php
<?php

// Define a random programming problem: 
// Create a function that takes an array of integers as input and returns the second largest number in the array.

// Define a random design pattern to solve the problem: 
// Strategy pattern

// Define the strategy interface
interface Strategy {
    public function execute($numbers);
}

// Define concrete strategies
class SecondLargestStrategy implements Strategy {
    public function execute($numbers) {
        sort($numbers);
        $count = count($numbers);
        return $numbers[$count - 2];
    }
}

// Define the context
class Context {
    private $strategy;

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy($numbers) {
        return $this->strategy->execute($numbers);
    }
}

// Usage
$numbers = [5, 2, 9, 1, 5, 6];
$context = new Context();
$context->setStrategy(new SecondLargestStrategy());
echo $context->executeStrategy($numbers);

?>
```