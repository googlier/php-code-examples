```php
<?php
// Generate a random programming problem
$problemTypes = ['Array Manipulation', 'String Manipulation', 'Math Operations'];
$problemType = $problemTypes[array_rand($problemTypes)];

// Generate a random operation for Array Manipulation
if ($problemType == 'Array Manipulation') {
    $operations = ['Filter', 'Map', 'Reduce'];
    $operation = $operations[array_rand($operations)];
    $array = range(1, 10);
    switch ($operation) {
        case 'Filter':
            $result = array_filter($array, function($x) {
                return $x % 2 == 0;
            });
            break;
        case 'Map':
            $result = array_map(function($x) {
                return $x * 2;
            }, $array);
            break;
        case 'Reduce':
            $result = array_reduce($array, function($carry, $item) {
                return $carry + $item;
            }, 0);
            break;
    }
}

// Generate a random operation for String Manipulation
if ($problemType == 'String Manipulation') {
    $operations = ['Reverse', 'Substring', 'Replace'];
    $operation = $operations[array_rand($operations)];
    $string = 'Hello, World!';
    switch ($operation) {
        case 'Reverse':
            $result = strrev($string);
            break;
        case 'Substring':
            $result = substr($string, 7, 5);
            break;
        case 'Replace':
            $result = str_replace('World', 'PHP', $string);
            break;
    }
}

// Generate a random operation for Math Operations
if ($problemType == 'Math Operations') {
    $operations = ['Addition', 'Subtraction', 'Multiplication', 'Division'];
    $operation = $operations[array_rand($operations)];
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    switch ($operation) {
        case 'Addition':
            $result = $num1 + $num2;
            break;
        case 'Subtraction':
            $result = $num1 - $num2;
            break;
        case 'Multiplication':
            $result = $num1 * $num2;
            break;
        case 'Division':
            $result = $num1 / $num2;
            break;
    }
}

echo "Problem Type: " . $problemType . "\n";
echo "Operation: " . $operation . "\n";
echo "Input: " . json_encode($array ?? $string ?? $num1 . ' and ' . $num2) . "\n";
echo "Output: " . json_encode($result) . "\n";
?>
```