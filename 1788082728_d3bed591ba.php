```php
<?php

// Random Programming Problem: Create a function that takes an array of integers and returns an array of the squares of those integers.

// Random Design Pattern: Strategy Pattern

// Define the context class
class ArrayProcessor
{
    private $strategy;

    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }

    public function process($array)
    {
        return $this->strategy->execute($array);
    }
}

// Define the strategy interface
interface SquaringStrategy
{
    public function execute($array);
}

// Define a concrete strategy class
class SquaringStrategyImpl implements SquaringStrategy
{
    public function execute($array)
    {
        $result = [];
        foreach ($array as $value) {
            $result[] = $value * $value;
        }
        return $result;
    }
}

// Usage
$array = [1, 2, 3, 4, 5];
$strategy = new SquaringStrategyImpl();
$processor = new ArrayProcessor();
$processor->setStrategy($strategy);
$result = $processor->process($array);

print_r($result);

?>
```