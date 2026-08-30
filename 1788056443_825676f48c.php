```php
<?php

// Problem: Create a function that generates a random string of a given length.

// Design Pattern: Factory Method

class RandomStringGenerator {
    public static function createRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

$length = 10;
echo "Random String: " . RandomStringGenerator::createRandomString($length);

?>
```