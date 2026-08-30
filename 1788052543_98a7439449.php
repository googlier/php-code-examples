```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all prime numbers in the array.

// Design Pattern: Strategy

interface PrimeSumStrategy {
    public function sum(array $numbers): int;
}

class SimplePrimeSumStrategy implements PrimeSumStrategy {
    public function sum(array $numbers): int {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($this->isPrime($number)) {
                $sum += $number;
            }
        }
        return $sum;
    }

    private function isPrime(int $number): bool {
        if ($number <= 1) return false;
        if ($number == 2) return true;
        if ($number % 2 == 0) return false;
        for ($i = 3; $i <= sqrt($number); $i += 2) {
            if ($number % $i == 0) return false;
        }
        return true;
    }
}

class AdvancedPrimeSumStrategy implements PrimeSumStrategy {
    public function sum(array $numbers): int {
        $sum = 0;
        $maxNumber = max($numbers);
        $sieve = array_fill(0, $maxNumber + 1, true);
        $sieve[0] = $sieve[1] = false;
        for ($i = 2; $i * $i <= $maxNumber; $i++) {
            if ($sieve[$i]) {
                for ($j = $i * $i; $j <= $maxNumber; $j += $i) {
                    $sieve[$j] = false;
                }
            }
        }
        foreach ($numbers as $number) {
            if ($sieve[$number]) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

$numbers = [2, 3, 4, 5, 6, 7, 8, 9, 10];
$strategy = new AdvancedPrimeSumStrategy();
echo $strategy->sum($numbers); // Output: 17
?>
```