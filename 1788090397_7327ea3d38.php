```php
<?php

// Problem: Implement a function to find the longest common prefix among an array of strings.

// Design Pattern: Strategy

interface PrefixFinder {
    public function findPrefix(array $strings): string;
}

class HorizontalScanPrefixFinder implements PrefixFinder {
    public function findPrefix(array $strings): string {
        if (empty($strings)) {
            return '';
        }
        $prefix = $strings[0];
        for ($i = 1; $i < count($strings); $i++) {
            while (strpos($strings[$i], $prefix) !== 0) {
                $prefix = substr($prefix, 0, -1);
                if (empty($prefix)) {
                    return '';
                }
            }
        }
        return $prefix;
    }
}

class VerticalScanPrefixFinder implements PrefixFinder {
    public function findPrefix(array $strings): string {
        if (empty($strings)) {
            return '';
        }
        $prefix = '';
        $length = min(array_map('strlen', $strings));
        for ($i = 0; $i < $length; $i++) {
            $char = $strings[0][$i];
            for ($j = 1; $j < count($strings); $j++) {
                if ($strings[$j][$i] !== $char) {
                    return $prefix;
                }
            }
            $prefix .= $char;
        }
        return $prefix;
    }
}

function findLongestCommonPrefix(array $strings): string {
    $finder = new VerticalScanPrefixFinder();
    return $finder->findPrefix($strings);
}

// Test
$strings = ["flower", "flow", "flight"];
echo "Longest common prefix: " . findLongestCommonPrefix($strings);
?>
```