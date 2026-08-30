```php
<?php
// Problem: Create a function to generate a random password of a given length

class PasswordGenerator {
    private $characters;

    public function __construct() {
        $this->characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    public function generatePassword($length) {
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
        return $password;
    }
}

$passwordGenerator = new PasswordGenerator();
$randomPassword = $passwordGenerator->generatePassword(10);
echo $randomPassword;
?>
```