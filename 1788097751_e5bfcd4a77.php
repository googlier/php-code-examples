```php
<?php

// Problem: Create a function that generates a random password of a given length, containing uppercase, lowercase, numbers, and special characters.

// Design Pattern: Factory Method

class PasswordGenerator {
    public static function createPassword($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}

// Usage
$password = PasswordGenerator::createPassword(12);
echo $password;

?>
```