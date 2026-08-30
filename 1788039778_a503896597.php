=== Ollama Query - 2026-08-29 21:43:58 ===
Model: qwen2.5-coder:7b
Prompt: Generate a random programming problem and solve it returning only php code, include open and closing php tags

Response:
Here's a random programming problem:

**Problem:**
Write a PHP script that generates a random password consisting of 8 characters, which includes at least one uppercase letter, one lowercase letter, one digit, and one special character.

**Solution:**
```php
<?php
function generateRandomPassword() {
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $special_chars = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    $password = '';
    $password .= $uppercase[rand(0, strlen($uppercase) - 1)];
    $password .= $lowercase[rand(0, strlen($lowercase) - 1)];
    $password .= $numbers[rand(0, strlen($numbers) - 1)];
    $password .= $special_chars[rand(0, strlen($special_chars) - 1)];

    $all_chars = $uppercase . $lowercase . $numbers . $special_chars;
    for ($i = 4; $i < 8; $i++) {
        $password .= $all_chars[rand(0, strlen($all_chars) - 1)];
    }

    return $password;
}

echo generateRandomPassword();
?>
```

This script defines a function `generateRandomPassword()` that constructs a password meeting the specified criteria and outputs it.

