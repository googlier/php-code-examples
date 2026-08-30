```php
<?php
// Define a function to calculate the sum of two numbers
function sum($a, $b) {
    return $a + $b;
}

// Create an array of numbers
$numbers = [1, 2, 3, 4, 5];

// Use the ArrayReduce design pattern to sum all numbers in the array
$sum = array_reduce($numbers, 'sum', 0);

// Output the result
echo "Sum of numbers: " . $sum;
?>
```