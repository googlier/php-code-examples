```php
<?php
// Problem: Implement a function to generate a random password of a specified length using a specific character set.

// Design Pattern: Factory Method

// Interface for PasswordGenerator
interface PasswordGenerator {
    public function generate($length);
}

// Concrete class for AlphanumericPasswordGenerator
class AlphanumericPasswordGenerator implements PasswordGenerator {
    public function generate($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}

// Concrete class for SpecialCharacterPasswordGenerator
class SpecialCharacterPasswordGenerator implements PasswordGenerator {
    public function generate($length) {
        $characters = '!@#$%^&*()_+{}|:<>?';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}

// Factory class for PasswordGeneratorFactory
class PasswordGeneratorFactory {
    public static function createGenerator($type) {
        switch ($type) {
            case 'alphanumeric':
                return new AlphanumericPasswordGenerator();
            case 'special':
                return new SpecialCharacterPasswordGenerator();
            default:
                throw new Exception("Invalid password type");
        }
    }
}

// Usage
try {
    $generator = PasswordGeneratorFactory::createGenerator('alphanumeric');
    echo $generator->generate(12); // Output: Random alphanumeric password of length 12

    $generator = PasswordGeneratorFactory::createGenerator('special');
    echo $generator->generate(8); // Output: Random special character password of length 8
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
```