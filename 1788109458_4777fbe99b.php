```php
<?php

// Problem: Implement a function to find the first non-repeating character in a string.

// Design Pattern: Factory Method

// Define the factory class
class NonRepeatingCharFactory {
    public static function create() {
        return new NonRepeatingChar();
    }
}

// Define the product interface
interface NonRepeatingChar {
    public function findFirstNonRepeatingChar($str);
}

// Define the concrete product
class NonRepeatingCharImpl implements NonRepeatingChar {
    public function findFirstNonRepeatingChar($str) {
        $charCount = [];
        
        // Count the occurrences of each character
        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];
            if (isset($charCount[$char])) {
                $charCount[$char]++;
            } else {
                $charCount[$char] = 1;
            }
        }
        
        // Find the first non-repeating character
        for ($i = 0; $i < strlen($str); $i++) {
            if ($charCount[$str[$i]] == 1) {
                return $str[$i];
            }
        }
        
        return null;
    }
}

// Usage
$factory = NonRepeatingCharFactory::create();
$result = $factory->findFirstNonRepeatingChar('programming');
echo $result; // Output: p
?>
```