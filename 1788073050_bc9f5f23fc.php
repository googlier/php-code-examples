```php
<?php

// Generate a random number between 1 and 100
$targetNumber = rand(1, 100);

// Define a class to represent a NumberGuessingGame
class NumberGuessingGame {
    private $targetNumber;

    public function __construct($targetNumber) {
        $this->targetNumber = $targetNumber;
    }

    public function guessNumber($number) {
        if ($number == $this->targetNumber) {
            return 'Congratulations! You guessed the number.';
        } elseif ($number < $this->targetNumber) {
            return 'Try again! The number is higher.';
        } else {
            return 'Try again! The number is lower.';
        }
    }
}

// Create an instance of NumberGuessingGame
$game = new NumberGuessingGame($targetNumber);

// Generate a random guess
$randomGuess = rand(1, 100);

// Get the result of the guess
$result = $game->guessNumber($randomGuess);

// Output the result
echo $result;

?>
```