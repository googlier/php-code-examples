```php
<?php

// Problem: Create a function that generates a random string of a specified length

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Solution using Singleton Design Pattern

class RandomStringGenerator {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new RandomStringGenerator();
        }
        return self::$instance;
    }

    public function generate($length) {
        return generateRandomString($length);
    }
}

// Usage

$generator = RandomStringGenerator::getInstance();
$randomString = $generator->generate(10);
echo $randomString;

?>
```