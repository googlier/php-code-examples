```php
<?php

// Problem: Implement a simple user registration system using the Strategy pattern to handle different types of validations.

interface ValidationStrategy {
    public function validate($data);
}

class EmailValidationStrategy implements ValidationStrategy {
    public function validate($data) {
        return filter_var($data, FILTER_VALIDATE_EMAIL) !== false;
    }
}

class PasswordValidationStrategy implements ValidationStrategy {
    public function validate($data) {
        return strlen($data) >= 8;
    }
}

class User {
    private $validationStrategies;

    public function __construct() {
        $this->validationStrategies = [
            new EmailValidationStrategy(),
            new PasswordValidationStrategy()
        ];
    }

    public function register($data) {
        foreach ($this->validationStrategies as $strategy) {
            if (!$strategy->validate($data)) {
                return "Validation failed: " . get_class($strategy) . " failed";
            }
        }
        return "User registered successfully";
    }
}

$user = new User();
echo $user->register("example@example.com");
echo $user->register("password123");
?>
```