```php
<?php

// Problem: Generate a function that takes an array of integers and returns a new array with each element squared.

// Design Pattern: Strategy

interface MathOperation {
    public function operate($value);
}

class SquareOperation implements MathOperation {
    public function operate($value) {
        return $value * $value;
    }
}

class ArrayProcessor {
    private $operation;

    public function __construct(MathOperation $operation) {
        $this->operation = $operation;
    }

    public function processArray($array) {
        $result = array_map(function($value) {
            return $this->operation->operate($value);
        }, $array);

        return $result;
    }
}

// Usage
$inputArray = [1, 2, 3, 4, 5];
$squareOperation = new SquareOperation();
$arrayProcessor = new ArrayProcessor($squareOperation);
$outputArray = $arrayProcessor->processArray($inputArray);

print_r($outputArray);

?>
```