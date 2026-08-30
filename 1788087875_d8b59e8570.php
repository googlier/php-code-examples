```php
<?php
// Define the problem: Implement a function to sort an array of integers using the QuickSort algorithm.

// Define the QuickSort class
class QuickSort {
    public function sort($array) {
        if (count($array) <= 1) {
            return $array;
        }

        $pivot = array_shift($array);
        $left = [];
        $right = [];

        foreach ($array as $item) {
            if ($item <= $pivot) {
                $left[] = $item;
            } else {
                $right[] = $item;
            }
        }

        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}

// Create an instance of QuickSort
$quickSort = new QuickSort();

// Define the input array
$inputArray = [3, 6, 8, 10, 1, 2, 1];

// Call the sort method and print the result
echo implode(", ", $quickSort->sort($inputArray));
?>
```