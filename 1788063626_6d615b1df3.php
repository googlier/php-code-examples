```php
<?php
// Problem: Create a function that generates a random password of a given length using a combination of uppercase letters, lowercase letters, numbers, and special characters.

// Solution: Use the Singleton design pattern to ensure that the password generator only creates one instance and uses a factory method to generate the password.

class PasswordGenerator {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new PasswordGenerator();
        }
        return self::$instance;
    }

    public function generatePassword($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}

// Usage
$password = PasswordGenerator::getInstance()->generatePassword(12);
echo $password;
?>
```