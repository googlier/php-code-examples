```php
<?php

// Problem: Implement a function to find the kth largest element in an unsorted array.

class QuickSelect {
    public function select($array, $k) {
        $low = 0;
        $high = count($array) - 1;
        while ($low <= $high) {
            $pivotIndex = $this->partition($array, $low, $high);
            if ($pivotIndex == $k) {
                return $array[$pivotIndex];
            } elseif ($pivotIndex < $k) {
                $low = $pivotIndex + 1;
            } else {
                $high = $pivotIndex - 1;
            }
        }
        return null;
    }

    private function partition(&$array, $low, $high) {
        $pivot = $array[$high];
        $i = $low - 1;
        for ($j = $low; $j < $high; $j++) {
            if ($array[$j] > $pivot) {
                $i++;
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
        $temp = $array[$i + 1];
        $array[$i + 1] = $array[$high];
        $array[$high] = $temp;
        return $i + 1;
    }
}

function findKthLargest($array, $k) {
    $quickSelect = new QuickSelect();
    return $quickSelect->select($array, $k - 1);
}

// Test the function
$array = [3, 2, 1, 5, 6, 4];
$k = 2;
echo "The {$k}th largest element is: " . findKthLargest($array, $k);

?>
```