```php
<?php
// Generate a random programming problem
$problemTypes = ['FizzBuzz', 'Reverse String', 'Find Duplicates'];
$problemType = $problemTypes[array_rand($problemTypes)];

switch ($problemType) {
    case 'FizzBuzz':
        $n = rand(1, 100);
        $result = '';
        for ($i = 1; $i <= $n; $i++) {
            $result .= ($i % 3 === 0 && $i % 5 === 0) ? 'FizzBuzz' : ($i % 3 === 0 ? 'Fizz' : ($i % 5 === 0 ? 'Buzz' : $i)) . ' ';
        }
        echo $result;
        break;
    case 'Reverse String':
        $string = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
        $result = strrev($string);
        echo $result;
        break;
    case 'Find Duplicates':
        $array = array_rand(array_flip(range(1, 10)), rand(2, 5));
        $result = array_keys(array_count_values($array) > 1);
        echo implode(', ', $result);
        break;
}
?>
```