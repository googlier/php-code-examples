```php
<?php
// Define a random programming problem
// Problem: Implement a function to sort an array of integers using the QuickSort algorithm

// Define a random design pattern
// Design Pattern: Strategy

// Define the context
class ArraySorter
{
    protected $sortStrategy;

    public function setSortStrategy(SortStrategy $sortStrategy)
    {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $array)
    {
        return $this->sortStrategy->sort($array);
    }
}

// Define the strategy interface
interface SortStrategy
{
    public function sort(array $array);
}

// Define the concrete strategy using QuickSort algorithm
class QuickSortStrategy implements SortStrategy
{
    public function sort(array $array)
    {
        if (count($array) <= 1) {
            return $array;
        }

        $pivot = array_pop($array);
        $less = [];
        $greater = [];

        foreach ($array as $value) {
            if ($value <= $pivot) {
                $less[] = $value;
            } else {
                $greater[] = $value;
            }
        }

        return array_merge($this->sort($less), [$pivot], $this->sort($greater));
    }
}

// Usage
$arraySorter = new ArraySorter();
$quickSortStrategy = new QuickSortStrategy();
$arraySorter->setSortStrategy($quickSortStrategy);

$unsortedArray = [3, 6, 8, 10, 1, 2, 1];
$sortedArray = $arraySorter->sort($unsortedArray);

print_r($sortedArray);
?>
```