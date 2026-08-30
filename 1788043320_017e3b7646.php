```php
<?php
// Problem: Implement a function to find the largest number in an array using the Decorator Design Pattern

// Interface for Number Operations
interface NumberOperation {
    public function operate($number);
}

// Concrete implementation for finding the largest number
class FindLargestNumber implements NumberOperation {
    public function operate($number) {
        return max($number);
    }
}

// Decorator to apply additional operations
class NumberDecorator implements NumberOperation {
    protected $operation;

    public function __construct(NumberOperation $operation) {
        $this->operation = $operation;
    }

    public function operate($number) {
        return $this->operation->operate($number);
    }
}

// Concrete decorator to add a constant to the number
class AddConstantDecorator extends NumberDecorator {
    private $constant;

    public function __construct(NumberOperation $operation, $constant) {
        parent::__construct($operation);
        $this->constant = $constant;
    }

    public function operate($number) {
        $result = parent::operate($number);
        return $result + $this->constant;
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5];
$operation = new FindLargestNumber();
$decoratedOperation = new AddConstantDecorator($operation, 10);
echo $decoratedOperation->operate($numbers); // Output: 15
?>
```