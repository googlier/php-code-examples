```php
<?php
// Problem: Implement a function to find the kth largest element in an array using the Quickselect algorithm.
// Design Pattern: Quickselect is based on the Divide and Conquer pattern.

function quickselect($array, $k) {
    $low = 0;
    $high = count($array) - 1;
    while ($low <= $high) {
        $pivotIndex = rand($low, $high);
        list($array, $pivotIndex) = partition($array, $low, $high, $pivotIndex);
        if ($pivotIndex == $k) {
            return $array[$k];
        } elseif ($pivotIndex > $k) {
            $high = $pivotIndex - 1;
        } else {
            $low = $pivotIndex + 1;
        }
    }
}

function partition(&$array, $low, $high, $pivotIndex) {
    $pivotValue = $array[$pivotIndex];
    swap($array, $pivotIndex, $high);
    $storeIndex = $low;
    for ($i = $low; $i < $high; $i++) {
        if ($array[$i] > $pivotValue) {
            swap($array, $i, $storeIndex);
            $storeIndex++;
        }
    }
    swap($array, $storeIndex, $high);
    return [$array, $storeIndex];
}

function swap(&$array, $i, $j) {
    $temp = $array[$i];
    $array[$i] = $array[$j];
    $array[$j] = $temp;
}

// Example usage:
$array = [3, 2, 1, 5, 6, 4];
$k = 2;
echo quickselect($array, $k); // Output the 3rd largest element (6)
?>
```