```php
<?php
// Problem: Create a function that takes an array of integers and returns an array containing only the prime numbers from the input array.

// Design Pattern: Strategy

interface PrimeChecker {
    public function isPrime($number);
}

class BasicPrimeChecker implements PrimeChecker {
    public function isPrime($number) {
        if ($number <= 1) return false;
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) return false;
        }
        return true;
    }
}

class AdvancedPrimeChecker implements PrimeChecker {
    public function isPrime($number) {
        if ($number <= 1) return false;
        if ($number % 2 == 0) return $number == 2;
        $i = 3;
        while ($i * $i <= $number) {
            if ($number % $i == 0) return false;
            $i += 2;
        }
        return true;
    }
}

class PrimeFilter {
    private $primeChecker;

    public function __construct(PrimeChecker $primeChecker) {
        $this->primeChecker = $primeChecker;
    }

    public function filterPrimes($numbers) {
        $primes = [];
        foreach ($numbers as $number) {
            if ($this->primeChecker->isPrime($number)) {
                $primes[] = $number;
            }
        }
        return $primes;
    }
}

// Usage
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
$primeFilter = new PrimeFilter(new BasicPrimeChecker());
$primes = $primeFilter->filterPrimes($numbers);
print_r($primes); // Output: Array ( [0] => 2 [1] => 3 [2] => 5 [3] => 7 [4] => 11 [5] => 13 )
?>
```