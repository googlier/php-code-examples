```php
<?php

// Problem: Implement a function to generate a random string of a specified length.

// Design Pattern: Factory Method

class StringGenerator {
    public static function createGenerator($length) {
        return new RandomStringGenerator($length);
    }
}

class RandomStringGenerator {
    private $length;
    private $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function __construct($length) {
        $this->length = $length;
    }

    public function generate() {
        $result = '';
        for ($i = 0; $i < $this->length; $i++) {
            $result .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
        return $result;
    }
}

$length = 10;
$generator = StringGenerator::createGenerator($length);
echo $generator->generate();

?>
```