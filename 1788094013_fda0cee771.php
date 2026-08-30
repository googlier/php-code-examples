```php
<?php
// Problem: Generate a function that takes an array of integers and returns an array with each element multiplied by 2.

// Design Pattern: Strategy

interface ArrayModifier {
    public function modify($array);
}

class MultiplyByTwo implements ArrayModifier {
    public function modify($array) {
        return array_map(function($item) {
            return $item * 2;
        }, $array);
    }
}

function processArray($array, ArrayModifier $modifier) {
    return $modifier->modify($array);
}

// Usage
$array = [1, 2, 3, 4, 5];
$modifier = new MultiplyByTwo();
$result = processArray($array, $modifier);
print_r($result);
?>
```