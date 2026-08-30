```php
<?php
// Problem: Implement a function that finds the maximum number of unique characters in a substring of a given string with length k.

function maxUniqueChars($s, $k) {
    $n = strlen($s);
    if ($n < $k) return -1;
    
    $maxCount = 0;
    for ($i = 0; $i <= $n - $k; $i++) {
        $substring = substr($s, $i, $k);
        $uniqueChars = count(array_unique(str_split($substring)));
        $maxCount = max($maxCount, $uniqueChars);
    }
    
    return $maxCount;
}

// Test the function
$s = "abcabcbb";
$k = 3;
echo maxUniqueChars($s, $k); // Output: 3
?>
```