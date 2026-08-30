```php
<?php

// Define the problem: Create a function that calculates the sum of all prime numbers up to a given number n.

// Solution using the Strategy Design Pattern

// Define the interface for the prime number strategy
interface PrimeNumberStrategy {
    public function isPrime($number);
    public function sumPrimes($limit);
}

// Concrete strategy for checking if a number is prime
class SimplePrimeNumberStrategy implements PrimeNumberStrategy {
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

    public function sumPrimes($limit) {
        $sum = 0;
        for ($i = 2; $i <= $limit; $i++) {
            if ($this->isPrime($i)) {
                $sum += $i;
            }
        }
        return $sum;
    }
}

// Context class that uses the strategy
class PrimeNumberCalculator {
    private $strategy;

    public function __construct(PrimeNumberStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateSum($limit) {
        return $this->strategy->sumPrimes($limit);
    }
}

// Usage
$strategy = new SimplePrimeNumberStrategy();
$calculator = new PrimeNumberCalculator($strategy);
$limit = 100;
echo "Sum of prime numbers up to $limit is: " . $calculator->calculateSum($limit);

?>
```