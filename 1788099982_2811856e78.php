```php
<?php

// Generate a random array of integers
$numbers = range(1, 100);
shuffle($numbers);

// Define a function to find the largest number in an array
function findLargestNumber($numbers) {
    return max($numbers);
}

// Use the function to find the largest number
$largestNumber = findLargestNumber($numbers);

// Output the result
echo "The largest number is: " . $largestNumber;

?>
```