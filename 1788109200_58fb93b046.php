```php
<?php
// Problem: Create a function that generates a random string of a given length, ensuring it contains at least one uppercase letter, one lowercase letter, one number, and one special character.

// Design Pattern: Strategy

class StringGenerationStrategy {
    public function generate($length) {
        // Implement the logic to generate a random string
    }
}

class UppercaseStrategy implements StringGenerationStrategy {
    public function generate($length) {
        return strtoupper($this->generateRandomChar($length));
    }

    private function generateRandomChar($length) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $index = mt_rand(0, strlen($characters) - 1);
        return $characters[$index];
    }
}

class LowercaseStrategy implements StringGenerationStrategy {
    public function generate($length) {
        return strtolower($this->generateRandomChar($length));
    }

    private function generateRandomChar($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $index = mt_rand(0, strlen($characters) - 1);
        return $characters[$index];
    }
}

class NumberStrategy implements StringGenerationStrategy {
    public function generate($length) {
        return mt_rand(0, 9);
    }
}

class SpecialCharacterStrategy implements StringGenerationStrategy {
    public function generate($length) {
        $characters = '!@#$%^&*()_+';
        $index = mt_rand(0, strlen($characters) - 1);
        return $characters[$index];
    }
}

class RandomStringGenerator {
    private $strategies;

    public function __construct() {
        $this->strategies = [
            new UppercaseStrategy(),
            new LowercaseStrategy(),
            new NumberStrategy(),
            new SpecialCharacterStrategy()
        ];
    }

    public function generate($length) {
        $result = '';
        foreach ($this->strategies as $strategy) {
            $result .= $strategy->generate($length);
        }
        // Shuffle the result to ensure randomness
        $result = str_shuffle($result);
        // Pad the result to match the desired length
        $result = substr(str_pad($result, $length), 0, $length);
        return $result;
    }
}

// Usage
$generator = new RandomStringGenerator();
$randomString = $generator->generate(10);
echo $randomString;
?>
```