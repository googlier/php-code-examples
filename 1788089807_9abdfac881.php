```php
<?php

// Problem: Implement a function to find the kth largest element in an array using the Quickselect algorithm.
// The Quickselect algorithm is a selection algorithm to find the kth smallest (or largest) element in an unordered list.

class Quickselect {
    public static function findKthLargest(array $arr, int $k): int {
        $k = count($arr) - $k;
        return self::select($arr, 0, count($arr) - 1, $k);
    }

    private static function select(array &$arr, int $left, int $right, int $k): int {
        if ($left == $right) {
            return $arr[$left];
        }

        $pivotIndex = self::partition($arr, $left, $right);
        if ($k == $pivotIndex) {
            return $arr[$k];
        } elseif ($k < $pivotIndex) {
            return self::select($arr, $left, $pivotIndex - 1, $k);
        } else {
            return self::select($arr, $pivotIndex + 1, $right, $k);
        }
    }

    private static function partition(array &$arr, int $left, int $right): int {
        $pivot = $arr[$right];
        $i = $left - 1;

        for ($j = $left; $j < $right; $j++) {
            if ($arr[$j] > $pivot) {
                $i++;
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }

        $temp = $arr[$i + 1];
        $arr[$i + 1] = $arr[$right];
        $arr[$right] = $temp;

        return $i + 1;
    }
}

// Example usage
$arr = [3, 2, 1, 5, 6, 4];
$k = 2;
echo "The {$k}th largest element is: " . Quickselect::findKthLargest($arr, $k);

?>
```