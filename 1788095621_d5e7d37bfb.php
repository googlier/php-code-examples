```php
<?php
// Problem: Create a function that takes an array of integers and returns the sum of all prime numbers in the array.

// Design Pattern: Strategy Pattern

interface PrimeSumStrategy {
    public function isPrime($number);
    public function sumPrimes($numbers);
}

class BasicPrimeSumStrategy implements PrimeSumStrategy {
    public function isPrime($number) {
        if ($number <= 1) return false;
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) return false;
        }
        return true;
    }

    public function sumPrimes($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($this->isPrime($number)) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

class EnhancedPrimeSumStrategy implements PrimeSumStrategy {
    public function isPrime($number) {
        if ($number <= 1) return false;
        if ($number == 2) return true;
        if ($number % 2 == 0) return false;
        for ($i = 3; $i <= sqrt($number); $i += 2) {
            if ($number % $i == 0) return false;
        }
        return true;
    }

    public function sumPrimes($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            if ($this->isPrime($number)) {
                $sum += $number;
            }
        }
        return $sum;
    }
}

function calculatePrimeSum($numbers, PrimeSumStrategy $strategy) {
    return $strategy->sumPrimes($numbers);
}

// Usage
$numbers = [2, 3, 4, 5, 6, 7, 8, 9, 10];
$basicStrategy = new BasicPrimeSumStrategy();
$enhancedStrategy = new EnhancedPrimeSumStrategy();

echo "Basic Prime Sum: " . calculatePrimeSum($numbers, $basicStrategy) . "\n";
echo "Enhanced Prime Sum: " . calculatePrimeSum($numbers, $enhancedStrategy) . "\n";
?>
```