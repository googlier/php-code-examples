```php
<?php
$numbers = range(1, 100);
shuffle($numbers);

$observer = function($number) {
    echo "Number: " . $number . "\n";
};

$numbers->each($observer);
?>
```