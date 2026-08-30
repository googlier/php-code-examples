```php
<?php

// Generate a random programming problem
$problemTypes = ['Array Manipulation', 'String Manipulation', 'Mathematical Operations', 'Conditional Logic'];
$problemType = $problemTypes[array_rand($problemTypes)];

// Generate random numbers for problem
$num1 = rand(1, 100);
$num2 = rand(1, 100);

if ($problemType == 'Array Manipulation') {
    $array = range(1, 10);
    shuffle($array);
    echo "Problem: Find the sum of elements at even indices in the shuffled array.\n";
    echo "Solution: ";
    echo array_sum(array_filter($array, function($key) {
        return $key % 2 == 0;
    }, ARRAY_FILTER_USE_KEY));
} elseif ($problemType == 'String Manipulation') {
    $string = 'Hello World';
    echo "Problem: Reverse the given string.\n";
    echo "Solution: ";
    echo strrev($string);
} elseif ($problemType == 'Mathematical Operations') {
    echo "Problem: Calculate the product of two numbers: $num1 and $num2.\n";
    echo "Solution: ";
    echo $num1 * $num2;
} elseif ($problemType == 'Conditional Logic') {
    if ($num1 > $num2) {
        echo "Problem: Check if the first number is greater than the second number: $num1 and $num2.\n";
        echo "Solution: Yes\n";
    } else {
        echo "Problem: Check if the first number is greater than the second number: $num1 and $num2.\n";
        echo "Solution: No\n";
    }
}

?>
```