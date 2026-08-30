```php
<?php

// Problem: Create a program that generates a list of prime numbers between 1 and 100 and display them in ascending order.

// Design Pattern: Strategy

class PrimeNumberGenerator {
    public function generate($start, $end) {
        $primeNumbers = [];
        $strategy = new SieveOfEratosthenesStrategy();
        $primeNumbers = $strategy->generate($start, $end);
        return $primeNumbers;
    }
}

interface PrimeNumberStrategy {
    public function generate($start, $end);
}

class SieveOfEratosthenesStrategy implements PrimeNumberStrategy {
    public function generate($start, $end) {
        $primes = [];
        $numbers = range($start, $end);
        foreach ($numbers as $number) {
            if ($this->isPrime($number)) {
                $primes[] = $number;
            }
        }
        sort($primes);
        return $primes;
    }

    private function isPrime($number) {
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

$primeGenerator = new PrimeNumberGenerator();
$primeNumbers = $primeGenerator->generate(1, 100);
print_r($primeNumbers);

?>
```