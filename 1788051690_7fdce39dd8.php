```php
<?php
// Problem: Implement a function that calculates the sum of all even numbers in a given array.

// Design Pattern: Strategy

class SumEvenStrategy {
    public function calculate($array) {
        $sum = 0;
        foreach ($array as $number) {
            if ($number % 2 == 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class SumOddStrategy {
    public function calculate($array) {
        $sum = 0;
        foreach ($array as $number) {
            if ($number % 2 != 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class ArraySum {
    private $strategy;

    public function __construct($strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function execute($array) {
        return $this->strategy->calculate($array);
    }
}

// Usage
$array = [1, 2, 3, 4, 5, 6];
$sumEven = new SumEvenStrategy();
$sumOdd = new SumOddStrategy();
$arraySum = new ArraySum($sumEven);
echo "Sum of even numbers: " . $arraySum->execute($array) . "\n";
$arraySum->setStrategy($sumOdd);
echo "Sum of odd numbers: " . $arraySum->execute($array) . "\n";
?>
```