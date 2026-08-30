```php
<?php
$numbers = range(1, 100);
shuffle($numbers);

function findMissingNumber($numbers) {
    $n = count($numbers);
    $expectedSum = $n * ($n + 1) / 2;
    $actualSum = array_sum($numbers);
    return $expectedSum - $actualSum;
}

$missingNumber = findMissingNumber($numbers);
echo "The missing number is: " . $missingNumber;
?>
```