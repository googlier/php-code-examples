```php
<?php
// Problem: Create a function that takes an array of integers and returns an array of their squares.

// Solution: Use the Map design pattern to apply a square operation to each element in the array.

class Map {
    private $func;

    public function __construct($func) {
        $this->func = $func;
    }

    public function apply($array) {
        $result = [];
        foreach ($array as $value) {
            $result[] = call_user_func($this->func, $value);
        }
        return $result;
    }
}

function square($x) {
    return $x * $x;
}

$array = [1, 2, 3, 4, 5];
$map = new Map('square');
$squares = $map->apply($array);

print_r($squares);
?>
```