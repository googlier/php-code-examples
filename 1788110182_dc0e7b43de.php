```php
<?php

// Problem: Implement a function that generates a random string of a given length using a specified character set.

// Design Pattern: Strategy

interface StringGeneratorStrategy {
    public function generateString($length);
}

class AlphanumericGeneratorStrategy implements StringGeneratorStrategy {
    public function generateString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, $charactersLength - 1)];
        }
        return $string;
    }
}

class HexadecimalGeneratorStrategy implements StringGeneratorStrategy {
    public function generateString($length) {
        $characters = '0123456789abcdef';
        $charactersLength = strlen($characters);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, $charactersLength - 1)];
        }
        return $string;
    }
}

class StringGenerator {
    private $strategy;

    public function __construct(StringGeneratorStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(StringGeneratorStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function generateString($length) {
        return $this->strategy->generateString($length);
    }
}

// Usage
$generator = new StringGenerator(new AlphanumericGeneratorStrategy());
echo $generator->generateString(10); // Output a random alphanumeric string of length 10

$generator->setStrategy(new HexadecimalGeneratorStrategy());
echo $generator->generateString(10); // Output a random hexadecimal string of length 10

?>
```