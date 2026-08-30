```php
<?php
// Problem: Implement a function that takes an array of integers and returns a new array where each element is the sum of the current and next element in the input array.
// Design Pattern: Strategy

class ArraySumStrategy {
    public function calculate($array) {
        $result = [];
        for ($i = 0; $i < count($array) - 1; $i++) {
            $result[] = $array[$i] + $array[$i + 1];
        }
        return $result;
    }
}

$array = [1, 2, 3, 4, 5];
$strategy = new ArraySumStrategy();
$result = $strategy->calculate($array);
print_r($result);
?>
```