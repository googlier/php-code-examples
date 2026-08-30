```php
<?php
// Random Programming Problem: Implement a function to find the longest substring without repeating characters.

class Solution {
    public function lengthOfLongestSubstring($s) {
        $n = strlen($s);
        $maxLength = 0;
        $start = 0;
        $charIndexMap = [];

        for ($end = 0; $end < $n; $end++) {
            $char = $s[$end];
            if (isset($charIndexMap[$char])) {
                $start = max($start, $charIndexMap[$char] + 1);
            }
            $charIndexMap[$char] = $end;
            $maxLength = max($maxLength, $end - $start + 1);
        }

        return $maxLength;
    }
}

// Example usage:
$solution = new Solution();
$input = "abcabcbb";
echo "Length of the longest substring without repeating characters: " . $solution->lengthOfLongestSubstring($input);
?>
```