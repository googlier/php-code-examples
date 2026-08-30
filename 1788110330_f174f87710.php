```php
<?php
// Problem: Implement a function to calculate the sum of all prime numbers up to a given limit

// Design Pattern: Strategy Pattern

interface PrimeSummationStrategy {
    public function sumPrimes($limit);
}

class NaivePrimeSummation implements PrimeSummationStrategy {
    public function sumPrimes($limit) {
        $sum = 0;
        for ($num = 2; $num <= $limit; $num++) {
            if ($this->isPrime($num)) {
                $sum += $num;
            }
        }
        return $sum;
    }

    private function isPrime($num) {
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return $num > 1;
    }
}

class MemoizedPrimeSummation implements PrimeSummationStrategy {
    private $memo = [];

    public function sumPrimes($limit) {
        if (!isset($this->memo[$limit])) {
            $sum = 0;
            for ($num = 2; $num <= $limit; $num++) {
                if ($this->isPrime($num)) {
                    $sum += $num;
                }
            }
            $this->memo[$limit] = $sum;
        }
        return $this->memo[$limit];
    }

    private function isPrime($num) {
        if (!isset($this->memo[$num])) {
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    $this->memo[$num] = false;
                    return false;
                }
            }
            $this->memo[$num] = $num > 1;
        }
        return $this->memo[$num];
    }
}

// Usage
$limit = 100;
$strategy = new MemoizedPrimeSummation();
echo $strategy->sumPrimes($limit);
?>
```