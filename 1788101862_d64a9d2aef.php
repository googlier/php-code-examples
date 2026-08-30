```php
<?php

// Generate a random array of 10 integers between 1 and 100
$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}

// Design Pattern: Strategy Pattern
interface SortStrategy {
    public function sort(array $numbers): array;
}

class BubbleSortStrategy implements SortStrategy {
    public function sort(array $numbers): array {
        $n = count($numbers);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($numbers[$j] > $numbers[$j + 1]) {
                    $temp = $numbers[$j];
                    $numbers[$j] = $numbers[$j + 1];
                    $numbers[$j + 1] = $temp;
                }
            }
        }
        return $numbers;
    }
}

class QuickSortStrategy implements SortStrategy {
    public function sort(array $numbers): array {
        if (count($numbers) <= 1) {
            return $numbers;
        }

        $pivot = $numbers[0];
        $left = [];
        $right = [];

        for ($i = 1; $i < count($numbers); $i++) {
            if ($numbers[$i] < $pivot) {
                $left[] = $numbers[$i];
            } else {
                $right[] = $numbers[$i];
            }
        }

        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}

// Randomly select a sorting strategy
$sortStrategy = rand(0, 1) == 0 ? new BubbleSortStrategy() : new QuickSortStrategy();

// Sort the array using the selected strategy
$sortedNumbers = $sortStrategy->sort($numbers);

// Output the sorted array
print_r($sortedNumbers);

?>
```