=== Ollama Query - 2026-08-29 21:34:39 ===
Model: qwen2.5-coder:7b
Prompt: Generate a random programming problem and solve it returning only php code, include open and closing php tags

Response:
Here's a random programming problem and its solution in PHP:

**Problem:**
Create a PHP function that generates a random password of a specified length. The password should include at least one uppercase letter, one lowercase letter, one digit, and one special character.

```php
<?php
function generatePassword($length) {
    // Define the character sets
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $digits = '0123456789';
    $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    // Ensure at least one character from each set is included
    $password = [
        $uppercase[rand(0, strlen($uppercase) - 1)],
        $lowercase[rand(0, strlen($lowercase) - 1)],
        $digits[rand(0, strlen($digits) - 1)],
        $specialChars[rand(0, strlen($specialChars) - 1)]
    ];

    // Fill the rest of the password length with a mix of all characters
    $allChars = $uppercase . $lowercase . $digits . $specialChars;
    for ($i = 4; $i < $length; $i++) {
        $password[] = $allChars[rand(0, strlen($allChars) - 1)];
    }

    // Shuffle the array to ensure randomness
    shuffle($password);

    // Convert the array to a string and return it
    return implode('', $password);
}

// Example usage:
$password = generatePassword(12);
echo "Generated Password: " . $password;
?>
```

This code defines a function `generatePassword` that takes an integer `$length` as an argument and returns a randomly generated password of that length. The password ensures that it includes at least one uppercase letter, one lowercase letter, one digit, and one special character. The remaining characters are a mix of all the defined character sets. The password is then shuffled to ensure randomness before being returned.

