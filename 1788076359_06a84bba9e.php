```php
<?php
$numbers = range(1, 100);
shuffle($numbers);
$target = array_sum($numbers) / 2;

function divideArray($array, $target) {
    $left = [];
    $right = [];
    foreach ($array as $num) {
        if (array_sum($left) < $target) {
            $left[] = $num;
        } else {
            $right[] = $num;
        }
    }
    return ['left' => $left, 'right' => $right];
}

$result = divideArray($numbers, $target);

echo "Left: " . implode(", ", $result['left']) . "\n";
echo "Right: " . implode(", ", $result['right']) . "\n";
?>
```