```php
<?php
$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$target = 15;
$combinations = array();

function findCombinations($numbers, $target, $index = 0, $current = array(), $sum = 0) {
    global $combinations;
    if ($sum == $target) {
        $combinations[] = $current;
        return;
    }
    if ($sum > $target || $index == count($numbers)) {
        return;
    }
    findCombinations($numbers, $target, $index + 1, $current, $sum);
    findCombinations($numbers, $target, $index + 1, array_merge($current, array($numbers[$index])), $sum + $numbers[$index]);
}

findCombinations($numbers, $target);
print_r($combinations);
?>
```