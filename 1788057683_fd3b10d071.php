```php
<?php
// Generate a random programming problem
$problems = [
    "Create a function to check if a given number is a prime number.",
    "Implement a simple calculator that can perform addition, subtraction, multiplication, and division.",
    "Design a class to represent a car with properties like make, model, year, and methods to start and stop the engine.",
    "Write a function to sort an array of integers in ascending order using a sorting algorithm of your choice.",
    "Create a function to generate a Fibonacci sequence up to a given number of terms."
];

$problem = $problems[array_rand($problems)];

// Solve the problem using a random design pattern
$patterns = [
    "Singleton",
    "Factory",
    "Adapter",
    "Decorator",
    "Observer"
];

$pattern = $patterns[array_rand($patterns)];

// Output the problem and solution
echo "<h1>$problem</h1>";
echo "<h2>Solution using $pattern Design Pattern</h2>";
?>
```