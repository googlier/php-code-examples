```php
<?php
$students = [
    ['name' => 'Alice', 'age' => 20],
    ['name' => 'Bob', 'age' => 22],
    ['name' => 'Charlie', 'age' => 21],
    ['name' => 'David', 'age' => 19],
    ['name' => 'Eve', 'age' => 23],
];

class AgeSorter {
    public function sort($students) {
        usort($students, function($a, $b) {
            return $a['age'] - $b['age'];
        });
        return $students;
    }
}

$sorter = new AgeSorter();
$sortedStudents = $sorter->sort($students);

echo "<ul>";
foreach ($sortedStudents as $student) {
    echo "<li>{$student['name']} - {$student['age']}</li>";
}
echo "</ul>";
?>
```