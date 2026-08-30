```php
<?php
$students = [
    "Alice" => 85,
    "Bob" => 92,
    "Charlie" => 78,
    "David" => 90,
    "Eve" => 88
];

function findTopStudents($students, $n) {
    usort($students, function($a, $b) {
        return $b[1] <=> $a[1];
    });
    return array_slice($students, 0, $n);
}

echo json_encode(findTopStudents($students, 3));
?>
```