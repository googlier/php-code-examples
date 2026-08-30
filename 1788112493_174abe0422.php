```php
<?php

// Generate a random number between 1 and 100
$randomNumber = mt_rand(1, 100);

// Problem: Create a function that returns the nearest prime number greater than the given number

// Design Pattern: Strategy

// Define the strategy interface
interface PrimeStrategy {
    public function getNearestPrime($number);
}

// Implement the strategy for prime numbers
class NearestPrimeStrategy implements PrimeStrategy {
    public function getNearestPrime($number) {
        while (true) {
            $number++;
            if ($this->isPrime($number)) {
                return $number;
            }
        }
    }

    private function isPrime($number) {
        if ($number <= 1) return false;
        if ($number <= 3) return true;
        if ($number % 2 == 0 || $number % 3 == 0) return false;
        for ($i = 5; $i * $i <= $number; $i += 6) {
            if ($number % $i == 0 || $number % ($i + 2) == 0) return false;
        }
        return true;
    }
}

// Create a context class to use the strategy
class PrimeContext {
    private $strategy;

    public function __construct(PrimeStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function getNearestPrime($number) {
        return $this->strategy->getNearestPrime($number);
    }
}

// Use the context class with the strategy
$strategy = new NearestPrimeStrategy();
$context = new PrimeContext($strategy);
$nearestPrime = $context->getNearestPrime($randomNumber);

echo "Random Number: " . $randomNumber . "<br>";
echo "Nearest Prime: " . $nearestPrime . "<br>";
?>
```