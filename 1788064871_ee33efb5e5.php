```php
<?php

// Problem: Implement a function to sort an array of integers using the quicksort algorithm

// Solution: Using the QuickSort design pattern

class QuickSort
{
    public function sort($array)
    {
        if (count($array) <= 1) {
            return $array;
        }

        $pivot = $array[0];
        $left = [];
        $right = [];

        for ($i = 1; $i < count($array); $i++) {
            if ($array[$i] < $pivot) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }

        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}

$numbers = [3, 6, 8, 10, 1, 2, 1];
$quickSort = new QuickSort();
$sortedNumbers = $quickSort->sort($numbers);

print_r($sortedNumbers);
?>
```