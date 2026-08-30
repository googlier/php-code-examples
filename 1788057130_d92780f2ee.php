```php
<?php

// Problem: Implement a function that takes an array of integers and returns the second largest number in the array.

// Design Pattern: Strategy

interface LargestNumberStrategy {
    public function findLargestNumber(array $numbers): int;
}

class SecondLargestNumberStrategy implements LargestNumberStrategy {
    public function findLargestNumber(array $numbers): int {
        $first = PHP_INT_MIN;
        $second = PHP_INT_MIN;
        foreach ($numbers as $number) {
            if ($number > $first) {
                $second = $first;
                $first = $number;
            } elseif ($number > $second && $number != $first) {
                $second = $number;
            }
        }
        return $second;
    }
}

class Program {
    public static function main() {
        $numbers = [3, 5, 1, 2, 4];
        $strategy = new SecondLargestNumberStrategy();
        echo "The second largest number is: " . $strategy->findLargestNumber($numbers);
    }
}

Program::main();

?>
```