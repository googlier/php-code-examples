```php
<?php
$numbers = array(10, 20, 30, 40, 50, 60, 70, 80, 90, 100);
$target = 75;

function findClosestNumber($numbers, $target) {
    $closest = null;
    foreach ($numbers as $number) {
        if ($closest === null || abs($number - $target) < abs($closest - $target)) {
            $closest = $number;
        }
    }
    return $closest;
}

echo findClosestNumber($numbers, $target);
?>
```