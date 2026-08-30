```php
<?php
// Problem: Implement a function that takes an array of integers and returns the sum of all prime numbers in the array.

// Design Pattern: Strategy

class PrimeSumStrategy {
    public function sum(array $numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($this->isPrime($number)) {
                $sum += $number;
            }
        }
        return $sum;
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

// Usage
$numbers = [2, 3, 4, 5, 6, 7, 8, 9, 10];
$primeSumStrategy = new PrimeSumStrategy();
echo $primeSumStrategy->sum($numbers); // Output: 17
?>
```