```php
<?php
// Problem: Create a function that generates a random password of a given length, ensuring it contains at least one uppercase letter, one lowercase letter, one number, and one special character.

// Design Pattern: Factory Method

class PasswordGenerator {
    public static function generate($length = 8) {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $special = '!@#$%^&*()_+';
        
        $password = '';
        $characters = $uppercase . $lowercase . $numbers . $special;
        
        $password .= $uppercase[rand(0, strlen($uppercase) - 1)];
        $password .= $lowercase[rand(0, strlen($lowercase) - 1)];
        $password .= $numbers[rand(0, strlen($numbers) - 1)];
        $password .= $special[rand(0, strlen($special) - 1)];
        
        for ($i = 4; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return $password;
    }
}

echo PasswordGenerator::generate(12);
?>
```