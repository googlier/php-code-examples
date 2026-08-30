```php
<?php

// Define a random programming problem
// Problem: Implement a function to find the largest palindrome in a given array of integers.

// Solution using the Strategy Design Pattern

// Define the Strategy interface
interface PalindromeStrategy {
    public function isPalindrome($number);
}

// Implement the Concrete Strategy
class NumericPalindromeStrategy implements PalindromeStrategy {
    public function isPalindrome($number) {
        $str = (string)$number;
        return $str === strrev($str);
    }
}

// Implement another Concrete Strategy
class StringPalindromeStrategy implements PalindromeStrategy {
    public function isPalindrome($string) {
        return $string === strrev($string);
    }
}

// Context class
class PalindromeFinder {
    private $strategy;

    public function setStrategy(PalindromeStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function findLargestPalindrome($array) {
        $largestPalindrome = null;
        foreach ($array as $item) {
            if ($this->strategy->isPalindrome($item)) {
                if ($largestPalindrome === null || $item > $largestPalindrome) {
                    $largestPalindrome = $item;
                }
            }
        }
        return $largestPalindrome;
    }
}

// Usage
$numbers = [123, 121, 131, 22, 456, 789, 10101, 11111];
$words = ["radar", "hello", "level", "world"];

$numericStrategy = new NumericPalindromeStrategy();
$stringStrategy = new StringPalindromeStrategy();

$finder = new PalindromeFinder();
$finder->setStrategy($numericStrategy);
echo "Largest numeric palindrome: " . $finder->findLargestPalindrome($numbers) . "\n";

$finder->setStrategy($stringStrategy);
echo "Largest string palindrome: " . $finder->findLargestPalindrome($words) . "\n";
?>
```