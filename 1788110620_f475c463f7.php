```php
<?php
// Random problem: Create a function that generates a random password of a given length, containing uppercase, lowercase, numbers, and special characters.

// Random design pattern: Strategy

// Define the strategy interface
interface PasswordStrategy {
    public function generate($length);
}

// Implement the concrete strategy for generating a random password
class RandomPasswordStrategy implements PasswordStrategy {
    private $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+';

    public function generate($length) {
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
        return $password;
    }
}

// Implement the context class that uses a strategy
class PasswordGenerator {
    private $strategy;

    public function __construct(PasswordStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(PasswordStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function generatePassword($length) {
        return $this->strategy->generate($length);
    }
}

// Usage
$generator = new PasswordGenerator(new RandomPasswordStrategy());
$randomPassword = $generator->generatePassword(12);
echo $randomPassword;
?>
```