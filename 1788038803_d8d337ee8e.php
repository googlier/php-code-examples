=== Ollama Query - 2026-08-29 21:27:47 ===
Model: qwen2.5-coder:7b
Prompt: Generate a random programming problem and solve it returning only php code, include open and closing php tags

Response:
Here is a random programming problem and its solution in PHP:

**Problem:**
Write a PHP function that takes an array of integers as input and returns the sum of all even numbers in the array. If there are no even numbers, return 0.

**Solution:**
```php
<?php
function sumOfEvenNumbers($numbers) {
    $sum = 0;
    foreach ($numbers as $number) {
        if ($number % 2 == 0) {
            $sum += $number;
        }
    }
    return $sum;
}

// Example usage:
$numbers = [1, 2, 3, 4, 5, 6];
echo sumOfEvenNumbers($numbers); // Output: 12
?>
```

Explanation:
- The function `sumOfEvenNumbers` takes an array of integers as its parameter.
- It initializes a variable `$sum` to 0.
- It iterates through each number in the array using a `foreach` loop.
- Inside the loop, it checks if the current number is even using the modulus operator (`%`). If the number is even, it adds it to the `$sum`.
- After the loop, it returns the total sum of even numbers.
- In the example usage, an array `[1, 2, 3, 4, 5, 6]` is passed to the function, and it correctly outputs `12` as the sum of the even numbers `2`, `4`, and `6`.

