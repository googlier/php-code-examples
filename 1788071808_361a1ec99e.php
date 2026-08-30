```php
<?php
// Problem: Generate a function that takes an array of integers and returns a new array with each element multiplied by 2.
// Design Pattern: Strategy

interface ArrayModifier {
    public function modify(array $array): array;
}

class DoubleArrayModifier implements ArrayModifier {
    public function modify(array $array): array {
        return array_map(function($item) {
            return $item * 2;
        }, $array);
    }
}

function applyModifier(array $array, ArrayModifier $modifier): array {
    return $modifier->modify($array);
}

// Usage
$numbers = [1, 2, 3, 4, 5];
$modifier = new DoubleArrayModifier();
$result = applyModifier($numbers, $modifier);
print_r($result);
?>
```