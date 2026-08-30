```php
<?php

// Generate a random number between 1 and 100
$randomNumber = rand(1, 100);

// Define a function to determine if a number is even or odd
function isEven($number) {
    return $number % 2 === 0;
}

// Use the Factory design pattern to create a number checker object
interface NumberChecker {
    public function check($number);
}

class EvenNumberChecker implements NumberChecker {
    public function check($number) {
        return isEven($number);
    }
}

class OddNumberChecker implements NumberChecker {
    public function check($number) {
        return !isEven($number);
    }
}

class NumberCheckerFactory {
    public static function createChecker($type) {
        switch ($type) {
            case 'even':
                return new EvenNumberChecker();
            case 'odd':
                return new OddNumberChecker();
            default:
                throw new Exception("Invalid type");
        }
    }
}

// Create a number checker object based on the type of number
$numberType = rand(0, 1) ? 'even' : 'odd';
$numberChecker = NumberCheckerFactory::createChecker($numberType);

// Check if the random number is even or odd and output the result
if ($numberChecker->check($randomNumber)) {
    echo "The number $randomNumber is even.";
} else {
    echo "The number $randomNumber is odd.";
}

?>
```