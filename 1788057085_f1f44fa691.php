```php
<?php

// Problem: Create a function that takes an array of strings and returns a new array with each string reversed.

// Solution: Use the Strategy pattern to create a reversible string transformer.

interface StringTransformer {
    public function transform($string);
}

class ReverseString implements StringTransformer {
    public function transform($string) {
        return strrev($string);
    }
}

class StringReverser {
    private $transformer;

    public function __construct(StringTransformer $transformer) {
        $this->transformer = $transformer;
    }

    public function reverseArray(array $strings) {
        $result = [];
        foreach ($strings as $string) {
            $result[] = $this->transformer->transform($string);
        }
        return $result;
    }
}

// Usage
$strings = ["Hello", "world", "!"];
$reverser = new StringReverser(new ReverseString());
$reversedStrings = $reverser->reverseArray($strings);
print_r($reversedStrings);

?>
```