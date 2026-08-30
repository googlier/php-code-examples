```php
<?php
// Generate a random programming problem
$problem = [
    'title' => 'Reverse a String',
    'description' => 'Write a function that takes a string as input and returns the string reversed.',
    'input' => 'Hello, World!',
    'expected_output' => '!dlroW ,olleH'
];

// Solve the problem using a design pattern
class StringReverser {
    public function reverse($string) {
        return strrev($string);
    }
}

// Create an instance of the StringReverser class
$reverser = new StringReverser();

// Get the input and expected output from the problem array
$input = $problem['input'];
$expected_output = $problem['expected_output'];

// Call the reverse method and get the result
$result = $reverser->reverse($input);

// Check if the result matches the expected output
if ($result === $expected_output) {
    echo 'The function works correctly!';
} else {
    echo 'The function does not work correctly.';
}

// Output the result
echo 'Result: ' . $result;
?>
```