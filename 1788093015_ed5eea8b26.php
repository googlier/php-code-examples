```php
<?php
$numbers = range(1, 100);
shuffle($numbers);

function findPair($numbers, $target) {
    $complements = [];
    foreach ($numbers as $number) {
        $complement = $target - $number;
        if (in_array($complement, $complements)) {
            return [$complement, $number];
        }
        $complements[] = $number;
    }
    return null;
}

$pair = findPair($numbers, 50);
echo "Pair found: (" . $pair[0] . ", " . $pair[1] . ")";
?>
```