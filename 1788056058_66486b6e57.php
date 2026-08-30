```php
<?php

// Define a RandomNumberGenerator interface
interface RandomNumberGenerator {
    public function generateNumber(): int;
}

// Implement the RandomNumberGenerator interface using the Factory Method pattern
class RandomNumberGeneratorFactory {
    public static function createGenerator(string $type): RandomNumberGenerator {
        switch ($type) {
            case 'Basic':
                return new BasicRandomNumberGenerator();
            case 'Advanced':
                return new AdvancedRandomNumberGenerator();
            default:
                throw new InvalidArgumentException("Unknown generator type");
        }
    }
}

// Implement the BasicRandomNumberGenerator class
class BasicRandomNumberGenerator implements RandomNumberGenerator {
    public function generateNumber(): int {
        return rand(1, 100);
    }
}

// Implement the AdvancedRandomNumberGenerator class
class AdvancedRandomNumberGenerator implements RandomNumberGenerator {
    public function generateNumber(): int {
        return rand(1, 1000);
    }
}

// Use the Factory Method pattern to create a random number generator and generate a number
$generator = RandomNumberGeneratorFactory::createGenerator('Advanced');
$number = $generator->generateNumber();
echo "Generated number: " . $number;

?>
```