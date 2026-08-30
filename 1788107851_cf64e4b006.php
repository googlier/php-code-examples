```php
<?php

// Generate a random number between 1 and 100
$randomNumber = rand(1, 100);

// Create a function that takes a number as input and returns whether it's even or odd
function isEvenOrOdd($number) {
    if ($number % 2 == 0) {
        return "Even";
    } else {
        return "Odd";
    }
}

// Apply the function to the random number
$result = isEvenOrOdd($randomNumber);

// Output the result
echo "The number $randomNumber is $result.";

?>
```