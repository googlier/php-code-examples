```php
<?php
// Problem: Implement a function that takes an array of integers and returns the maximum product of three numbers.

// Design Pattern: Factory Method

class ProductCalculator {
    protected $numbers;

    public function __construct(array $numbers) {
        $this->numbers = $numbers;
    }

    public function calculate() {
        sort($this->numbers);
        $n = count($this->numbers);
        $max1 = $this->numbers[$n - 1] * $this->numbers[$n - 2] * $this->numbers[$n - 3];
        $max2 = $this->numbers[0] * $this->numbers[1] * $this->numbers[$n - 1];
        return max($max1, $max2);
    }
}

class ProductCalculatorFactory {
    public static function create(array $numbers) {
        return new ProductCalculator($numbers);
    }
}

$numbers = [1, 2, 3, 4, 5];
$calculator = ProductCalculatorFactory::create($numbers);
echo $calculator->calculate(); // Output: 60
?>
```