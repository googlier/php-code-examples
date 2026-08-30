=== Ollama Query - 2026-08-29 21:41:34 ===
Model: qwen2.5-coder:7b
Prompt: Generate a random programming problem and solve it returning only php code, include open and closing php tags

Response:
Certainly! Here is a random programming problem and its solution in PHP:

### Problem:
Write a PHP function that takes an array of integers and returns the second largest number in the array. If the array has fewer than two distinct numbers, return `null`.

### Solution:
```php
<?php
function second_largest($numbers) {
    if (count($numbers) < 2) {
        return null;
    }
    
    $uniqueNumbers = array_unique($numbers);
    if (count($uniqueNumbers) < 2) {
        return null;
    }
    
    rsort($uniqueNumbers);
    return $uniqueNumbers[1];
}

// Example usage:
$numbers = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5];
echo second_largest($numbers); // Output: 6
?>
```

### Explanation:
1. **Check the length of the array**: If the array has fewer than two elements, return `null`.
2. **Remove duplicates**: Use `array_unique()` to remove duplicate numbers.
3. **Check the length of unique numbers**: If there are fewer than two distinct numbers, return `null`.
4. **Sort the array in descending order**: Use `rsort()`.
5. **Return the second element**: The second element in the sorted array is the second largest number.

