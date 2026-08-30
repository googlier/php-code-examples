```php
<?php
// Problem: Create a function that calculates the sum of all prime numbers within a given range.

// Design Pattern: Strategy

class PrimeNumberStrategy {
    public function isPrime($number) {
        if ($number <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }
}

class SumPrimeNumbers {
    private $strategy;

    public function __construct(PrimeNumberStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function sumInRange($start, $end) {
        $sum = 0;
        for ($i = $start; $i <= $end; $i++) {
            if ($this->strategy->isPrime($i)) {
                $sum += $i;
            }
        }
        return $sum;
    }
}

$strategy = new PrimeNumberStrategy();
$sumCalculator = new SumPrimeNumbers($strategy);
echo $sumCalculator->sumInRange(1, 100); // Output: 1060
?>
```