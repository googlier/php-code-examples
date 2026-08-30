```php
<?php
// Problem: Create a function to find the largest number in an array using the Decorator Design Pattern.

// Define the Component interface
interface NumberComponent {
    public function getNumber();
}

// Concrete Component
class NumberArray implements NumberComponent {
    private $numbers;

    public function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public function getNumber() {
        return $this->numbers;
    }
}

// Decorator
abstract class NumberDecorator implements NumberComponent {
    protected $numberComponent;

    public function __construct(NumberComponent $numberComponent) {
        $this->numberComponent = $numberComponent;
    }

    public function getNumber() {
        return $this->numberComponent->getNumber();
    }
}

// Concrete Decorator
class MaxNumberDecorator extends NumberDecorator {
    public function getNumber() {
        return max($this->numberComponent->getNumber());
    }
}

// Usage
$numbers = [3, 5, 1, 2, 4];
$numberArray = new NumberArray($numbers);
$maxNumberDecorator = new MaxNumberDecorator($numberArray);

echo $maxNumberDecorator->getNumber(); // Output: 5
?>
```