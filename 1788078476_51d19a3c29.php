```php
<?php

// Define the problem: Create a function that generates a random password of a given length.
// The function should include at least one uppercase letter, one lowercase letter, one digit, and one special character.

// Define the design pattern: Strategy
// Strategy pattern allows defining a family of algorithms, encapsulating each one, and making them interchangeable.

// Define the context: PasswordGenerator
// Context is an object that uses a strategy to determine how to generate a password.

// Define the strategy interface: PasswordStrategy
// Strategy interface defines the algorithm for generating a password.

// Define concrete strategies: UpperCaseStrategy, LowerCaseStrategy, DigitStrategy, SpecialCharacterStrategy
// Each concrete strategy implements the PasswordStrategy interface.

// Context
class PasswordGenerator
{
    private $strategy;

    public function setStrategy(PasswordStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function generatePassword($length)
    {
        return $this->strategy->generate($length);
    }
}

// Strategy interface
interface PasswordStrategy
{
    public function generate($length);
}

// Concrete strategies
class UpperCaseStrategy implements PasswordStrategy
{
    public function generate($length)
    {
        return strtoupper($this->generateRandomCharacter());
    }

    private function generateRandomCharacter()
    {
        return chr(rand(65, 90));
    }
}

class LowerCaseStrategy implements PasswordStrategy
{
    public function generate($length)
    {
        return strtolower($this->generateRandomCharacter());
    }

    private function generateRandomCharacter()
    {
        return chr(rand(97, 122));
    }
}

class DigitStrategy implements PasswordStrategy
{
    public function generate($length)
    {
        return rand(0, 9);
    }
}

class SpecialCharacterStrategy implements PasswordStrategy
{
    private $specialCharacters = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+'];

    public function generate($length)
    {
        return $this->specialCharacters[rand(0, count($this->specialCharacters) - 1)];
    }
}

// Usage
$passwordGenerator = new PasswordGenerator();

$passwordGenerator->setStrategy(new UpperCaseStrategy());
$upperCasePart = $passwordGenerator->generatePassword(1);

$passwordGenerator->setStrategy(new LowerCaseStrategy());
$lowerCasePart = $passwordGenerator->generatePassword(1);

$passwordGenerator->setStrategy(new DigitStrategy());
$digitPart = $passwordGenerator->generatePassword(1);

$passwordGenerator->setStrategy(new SpecialCharacterStrategy());
$specialCharacterPart = $passwordGenerator->generatePassword(1);

$password = $upperCasePart . $lowerCasePart . $digitPart . $specialCharacterPart;
$password .= str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+', $length - 4));

echo $password;
?>
```